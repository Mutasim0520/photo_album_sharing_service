<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album as Albums;
use App\Photo as Photos;
use Illuminate\Support\Facades\Input;
use League\Flysystem\Exception;
use Symfony\Component\Yaml\Tests\A;
use Auth;
use App\Comment as Comments;
use Illuminate\Support\Facades\DB;
use App\Star as Stars;
use Session;

class AlbumController extends Controller
{
    
    protected function countStars($album_id){
        try{
            $stars = DB::table('stars')
                ->where('album_id','=',$album_id)
                ->select('star', DB::raw('count(*) as total'))
                ->groupBy('star')
                ->orderBy('star','DESC')
                ->get();
            return json_encode($stars);
        }catch (\Exception $e){
        }
    }

    public function showProfile(){

        try{
            $albums = Albums::with(['photo','comment'])->where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();
            $stars = [];
            foreach ($albums as $item){
                $obj = new \stdClass();
                $obj->id = $item->id;
                $obj->stars = json_decode($this->countStars($item->id));
                $stars[] = $obj;
            }
            $final_data = [];
            foreach ($albums as $album){
                foreach ($stars as $star){
                    if($star->id == $album->id){
                        $obj = new \stdClass();
                        $obj->id = $album->id;
                        $obj->name = $album->name;
                        $obj->created_at = $album->created_at;
                        $obj->perma_link = $album->perma_link;
                        $obj->password = $album->password;
                        $obj->photo = $album->photo;
                        $obj->comment = $album->comment;
                        $obj->star = $star->stars;
                        $final_data[] = $obj;
                        break;
                    }
                }
            }

            return view('user.profile',['albums' => $final_data]);
        }catch(\Exception $e){
            return response("error",500);
        }
    }

    public function showAlbumAddForm(){
        try{
            return view('user.addAlbumForm');
        }catch (\Exception $e){
            return response("error",500);
        }
    }

    public function storeAlbum(Request $request){
        try{
            // Validate the inputs
            $this->validate($request,array(
                'album_name' => 'required|max:255',
                'photos' => 'required',
                'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:10000'
            ));

            //Create shareable unique link for the album
            while (1==1){
                $perma_link =mt_rand().'_'.preg_replace('/[^A-Za-z0-9\-]/', '_', $request->album_name).'_'.Auth::user()->id.'_'.time();
                $check_perma_link = Albums::where('perma_link',$perma_link)->first();
                if(!$check_perma_link){
                    break;
                }
            }
            $password = bcrypt($perma_link);
            $album = new Albums();
            $album->name = $request->album_name;
            $album->perma_link = $perma_link;
            $album->password = $password;
            $album->user_id = Auth::user()->id;
            $album->save();

            if($request->hasFile('photos')){
                $album = Albums::orderBy('id','DESC')->first();
                $counter = 0;
                foreach ($request->photos as $item){
                    $fileName = time().$counter.$item->getClientOriginalName();
                    $item->move(public_path("/uploads/albums/$album->id"),$fileName);
                    $photo = new Photos();
                    $photo->path = $fileName;
                    $album->photo()->save($photo);
                    $counter++;
                }
            }
            return redirect('/profile');
        }catch (\Exception $e){
            return response("error",500);
        }
    }

    public function showAlbumCredentialsForm(Request $request){
        try{
            return view('user.albumCredentialForm');
        }catch(\Exception $e){
            return response("error",500);
        }
    }

    public function validateAlbumCredentials(Request $request){
        try{
            $this->validate($request,[
                'perma_link' => 'required|max:255',
                'password' => 'required|max:255'
            ]);

            $album = Albums::where([['password','=',$request->password],['perma_link','=',$request->perma_link]])->first();
            if($album){
                session(['password' => $album->password]);
                return redirect("/album/$album->perma_link");
            }
            else{
                Session::flash('album_credentials_missmatch','Your albums credentials did not match');
                return redirect()->back()->withInput(Input::all());
            }
        }catch(\Exception $e){
            return response("error",500);
        }
    }

    public function showIndivisualAlbum(Request $request){
        try{
            $album = Albums::where([['perma_link','=',$request->perma_link]])->first();
            if(session('password') == $album->password){
                $stars = json_decode($this->countStars($album->id));
                $cast_rating_check = Albums::with(['star' => function($query) use($request){
                    return $query->where('ip',$request->ip());
                }])->find($album->id);
                return view('user.album',['album' => $album , 'rate_casting_ability' => $cast_rating_check,'stars' =>$stars]);
            }
            else{
                Session::flash('album_unauthorized','You don not have any permission to the requested album');
                return redirect('user.album.credential');
            }
        }catch (\Exception $e){
            return response("error",500);
        }
    }

    public function storeComment(Request $request){
        try{
            if($request->ajax()){
                $album = Albums::find($request->id);
                $comment = new Comments();
                $comment->text = $request->text;
                $comment->ip = $request->ip();
                $album->comment()->save($comment);
                return response("ok",200);
            }
        }catch (\Exception $e){
            return response("error",500);
        }
    }

    public function storeRate(Request $request){
        try{
            if($request->ajax()){
                $album = Albums::find($request->id);
                $star = new Stars();
                $star->star = $request->rate;
                $star->ip = $request->ip();
                $album->star()->save($star);
                return response("ok",200);
            }
        }catch (\Exception $e){
            return response("error",500);
        }
    }
}
