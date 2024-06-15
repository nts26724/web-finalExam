<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer_login');
    }
    public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Tên đăng nhập là bắt buộc.',
            'password.required' => 'Mật khẩu là bắt buộc.',
        ]);
        $username = $request->username;
        $password = $request->password;
        $customer = Customer::where('username',$username)->where('password',$password)->first();
        if($customer){
            Session::put('customer',$customer);
            dd(Session::get('customer'));
        }
        return redirect()->route('customer.login');
    }
    public function create(){
        return view('customer_register');
    }
    public function store(Request $request){
        $request->validate([
            'username' => 'required|unique:customers',
            'password' => 'required',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'numeric',

        ], [
            'username.unique' => 'Tên đăng nhập đã tồn tại.',
            'username.required' => 'Tên đăng nhập là bắt buộc.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'address.required' => 'Địa chỉ là bắt buộc.',
            'phone.numeric' => 'Số điện thoại phải là số.',
            'name.required' => 'Tên là bắt buộc.',
        ]);
        try{
            Customer::create($request->all());
            Session::flash('success','Đăng ký thành công');
            return redirect()->route('customer.login');
        }catch(\Exception $e){
            Session::flash('error','Đăng ký thất bại');
            return redirect()->back();
        }
    }

    public function show(){
        $customer = Customer::paginate(5);

        return view('admin.customer_list',[
            'title' => 'Danh sách khách hàng',
            'customers' => $customer
        ]);
    }
    public function update(CustomerRequest $request, Customer $customer){
        try{
            $validatedData = $request->validated();

            $customer->update([
                'name' => $validatedData['name'],
                'username' => $validatedData['username'],
                'password' => $validatedData['password'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
            ]);
            Session::flash('success','Cập nhật khách hàng thành công');
            return redirect()->route('admin.customers.list');
        } catch (\Exception $e){
            Session::flash('error','Cập nhật khách hàng thất bại');
            return redirect()->back();
        }
    }
    public function destroy(Request $request){
        try{
           $customer = Customer::findorFail($request->id);
           $customer->delete();
           return response()->json([
                'error' => false,
                'message' => 'Xóa khách hàng thành công'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'error' => true,
                'message' => 'Xóa khách hàng thất bại'
            ]);
        }
    }
    public function edit(Customer $customer){
        return view('admin.customer_edit',[
            'title' => 'Chỉnh sửa khách hàng',
            'customer' => $customer
        ]);
    }
}
