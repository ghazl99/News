<?php

namespace App\Http\Controllers\api;

use App\Models\Meal;
use App\Models\Menu;
use App\Models\Role;
use App\Models\User;
use App\Models\Role_User;
use Illuminate\Http\Request;
use App\Traits\ApiTraitResponse;
use App\Traits\ApiValidationMenu;
use App\Http\Controllers\Controller;
use App\Http\Resources\MealResource;
use App\Http\Resources\MenuResource;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class postController extends Controller {
    use ApiTraitResponse;
    use ApiValidationMenu;

    public function getRole() {

        $user = Role::with( 'users' )->get();

        return response( $user, 200 );

    }

    public function insertTypeMenu( Request $request ) {
        //validate
        // ApiValidationMenu:: validation( $request );
        $rules = [ 'type'=> 'required|max:30|unique:menus,type',
                                            // 'price'=>'required|numeric',
                                            //  'details'=> 'required',
        ]   ;

        $val = Validator::make( $request->all(), $rules );
        if ( $val ->fails() ) {

            return $this->ApiResponse( null, 404, $val->errors() );
        }
        $menu = Menu::create( [ 'type'=>$request->type ] );
        //طريقة عرض البيانات يلي خزنتا باستخدام resource
        return new MenuResource($menu);

        //طريقة تانية لارجاع البيانات يلي خزنتا
        if ( $menu ) {
            return $this->ApiResponse( $menu, 202, 'ok' );
        }
    }
    public function show(Meal $meal)
    {
        return new PostResource($meal);
    }
    public function showAll() {
        $meals=Meal::with('menu')->get();
        return MealResource::collection($meals);
    }

    public function update( request $request, $id ) {
         $rules = [ 'type'=> 'required|max:30|unique:menus,type',
                                            // 'price'=>'required|numeric',
                                            //  'details'=> 'required',
        ]   ;

        $val = Validator::make( $request->all(), $rules );
        if ( $val ->fails() ) {

            return $this->ApiResponse( null, 404, $val->errors() );
        }
        $TypeMenu=Menu::find($id);
        if(!$TypeMenu)
        {
            return $this->ApiResponse( null, 404, 'type of menu not found:' );
        }
        $TypeMenu->update(['type'=>$request->type]);
        return $this->ApiResponse( $TypeMenu, 202, 'ok' );


    }
    public function delete($id) {

        $deleteType=Menu::find($id);
        if(!$deleteType)
        {
            return $this->ApiResponse( null, 404, 'type of menu not found:' );
        }
        $deleteType->delete($id);
        return response()->noContent();
    }
}