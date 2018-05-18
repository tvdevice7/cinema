<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\User;
use App\phim;
use App\khuyen_mai;
use App\rap_chieu;
use App\suat_chieu;
use App\khung_gio;
use App\dien_vien;
use App\the_loai;
use Auth;
use Carbon;

class PageController extends Controller
{
    public function getIndex()//lay trang chu
    {
        $currentDate = Carbon\Carbon::now()->toDateString();
        $km = khuyen_mai::all();
        $pre_phim = phim::where('batdau','>',$currentDate)->get();
        $new_phim = phim::where('batdau','<',$currentDate)->get();
         
        return view('page.trangchu', compact('new_phim','pre_phim','km'));
    }

    public function get404()
    {
        return view('page.404');
    }

    public function getProfile()
    {
        return view('page.profile');
    }

    public function getAbout()
    {
        return view('page.about');
    }

    public function getLichSu()
    {
        return view('page.lichsu');
    }

    public function getChiTietLichSu()
    {
        return view('page.chitietlichsu');
    }

    public function getPhimDaXem()
    {
        return view('page.phimdaxem');
    }

    public function phimDangChieu()
    {
        $currentDate = Carbon\Carbon::now()->toDateString();
        $phim = phim::where('batdau','<',$currentDate)->get();
        return view('page.phimdangchieu',compact('phim'));
    }

    public function phimSapChieu()
    {
        $currentDate = Carbon\Carbon::now()->toDateString();
        $phim = phim::where('batdau','>',$currentDate)->get();
        return view('page.phimsapchieu',compact('phim'));
    }

    public function getMuaVe()
    {
        return view('page.muave');
    }

    public function heThongRap()
    {
        $rap = rap_chieu::all();
        return view('page.hethongrap',compact('rap'));
    }

    public function contact()
    {
        return view('page.contact');
    }

    public function getDangKy()
    {
        return view('page.dangky');
    }

    public function getFAQ()
    {
        return view('page.faq');
    }

    public function getFAQduy()
    {
        return view('page.faqduy');
    }

    public function getChitiet($idPhim)
    {
        
        $phim = phim::where('maphim',$idPhim)->get();
        $dienvien = dien_vien::where('maphim',$idPhim)->get();
        $theloai = the_loai::where('maphim',$idPhim)->get();
         
        return view('page.chitiet',compact('phim','dienvien','theloai'));
    }

    public function getChonPhim($idPhim)
    {
        $phimDaChon = phim::where('maphim',$idPhim)->get();
        //dd($phimDaChon);
        return view('page.chonphim',compact('phimDaChon'));
    }

    public function getChonRap($idPhim)
    {
        $phimDaChon = phim::where('maphim',$idPhim)->get();
        $rap = rap_chieu::all();
        return view('page.chonrap',compact('phimDaChon','rap'));
    }

    public function getChonSuatChieu($idPhim, $idRap)
    {
        $phimDaChon = phim::where('maphim',$idPhim)->get();
        $rapDaChon = rap_chieu::where('marap',$idRap)->get();
        
        
        $suatchieu = suat_chieu::where([
            ['maphim','=',$idPhim],
            ['marap','=', $idRap]
        ])->select('ngaychieu')->distinct()->get();

        $qr = suat_chieu::join('khung_gio','suat_chieu.makhunggio','khung_gio.makhunggio')->where([
            ['maphim','=',$idPhim],
            ['marap','=', $idRap]
        ])->get();

        $kgtungngay = [];
        foreach($suatchieu as $sc){
            $kgtungngay[] = suat_chieu::join('khung_gio','suat_chieu.makhunggio','khung_gio.makhunggio')
            ->where([
                ['ngaychieu',$sc->ngaychieu],
                ['maphim','=',$idPhim],
                ['marap','=', $idRap]
                ])->get();
        }
        /*
        $currentDate = Carbon\Carbon::now();
        $due = Carbon\Carbon::now()->modify('+7 day');
        $arrDate = [];
        for($i = $currentDate; $i <= $due; $i++){
            $arrDate[] = $currentDate->toDateString();
            $currentDate->addDay();
        }*/
        //dd($kgtungngay[0]->first()->ngaychieu);
        return view('page.chonsuatchieu',compact('phimDaChon','rapDaChon','kgtungngay','suatchieu'));
    }

    public function postSignin(Request $req)
    {
        $this->validate($req, 
        [
            'email'=>'required|email',
            'password'=>'required|min:6|max:20',
        ],
        [
            'email.required'=>'Vui lòng điền email',
            'password.required'=>'Vui lòng nhập mật khẩu! ',
            'password.max'=>'Sai mật khẩu! ',
            'password.min'=>'Sai mật khẩu! '

        ]);
        //$credentials = $req->only('email', 'password');
        $credentials = array('email'=>$req->email,'password'=>$req->password);
        if (Auth::attempt($credentials)) {
            $data = $req->session()->all();
            //return redirect()->route('dang-ky')->with(['flag'=>'success','mes'=>'Đăng nhập thành công']);
            return redirect()->back()->with(['flag'=>'success','mes'=>'Đăng nhập thành công']);
        }else{
            return redirect()->back()->with(['flag'=>'danger','mes'=>'Đăng nhập thất bại']);
        }
        

    }

    public function postSignup(Request $req)
    {
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                 
                're_password'=>'required|same:password',
                'agree'=>'required'
            ],
            [
                'email.required'=>'Vui lòng nhập email! ',
                'email.email'=>'email không đúng! ',
                'email.unique'=>'email đã được sử dụng! ',
                 
                'password.required'=>'Vui lòng nhập mật khẩu! ',
                're_password.required'=>'Vui lòng nhập lại mật khẩu! ',
                're_password.same'=>'Mật khẩu không khớp! ',
                'password.max'=>'Mật khẩu tối đa 20 kí tự! ',
                'password.min'=>'Mật khẩu cần ít nhất 6 kí tự! ',
                'agree.required'=>'Bạn chưa đọc và đồng ý với các điều khoản.'
            ]);
        
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công, hãy đăng nhập lại');

    }

    public function postChangePass(Request $req)
    {
        $this->validate($req,
            [
                'password_old'=>'required',
                'password'=>'required|min:6|max:20',
                're_password'=>'required|same:password'
            ],
            [
                'password_old.required'=>'Vui lòng nhập mật khẩu cũ! ',
                'password.required'=>'Vui lòng nhập mật khẩu! ',
                're_password.required'=>'Vui lòng nhập lại mật khẩu! ',
                're_password.same'=>'Mật khẩu không khớp! ',
                'password.max'=>'Mật khẩu tối đa 20 kí tự! ',
                'password.min'=>'Mật khẩu cần ít nhất 6 kí tự! '
            ]);
        
        if(Hash::check($req['password_old'], Auth::user()->password))
        {
            $user_id = Auth::user()->id;                       
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($req['password']);;
            $obj_user->save(); 
            return redirect()->back()->with(['flag'=>'success','mes'=>'Đổi mật khẩu thành công']);
        }else{
            return redirect()->back()->with(['flag'=>'danger','mes'=>'Sai mật khẩu']);
        }
    }
    
    public function postchangePersonalData(Request $req)
    {
        $this->validate($req,
            [
                'hoten'=>'required|max:50',
                'phone'=>'numeric'
            ],
            [
                'hoten.required'=>'Vui lòng nhập đúng tên! ',
                'phone.numeric'=>'Số điện thoại không đúng',
                'hoten.max'=>'Tên quá dài! ',
            ]);
        
        $user_id = Auth::user()->id;                       
        $obj_user = User::find($user_id);
        $obj_user->name = $req['hoten'];    
        $obj_user->gioitinh = $req['gioitinh'];
        $obj_user->ngaysinh = $req['ngaysinh'];
        $obj_user->sodt = $req['sodt'];
        
        
        $obj_user->save(); 
        return redirect()->back()->with(['flag'=>'success','mes'=>'Đổi thông tin thành công']);
        
    }

    public function getDangxuat()
    {
        Auth::logout();
        return redirect()->route('trang-chu');
    }

}
