<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStorePaymentMethod;
use App\PaymentMethod;

class PaymentMethodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $payments = PaymentMethod::paginate(5);
        return view('admin.payment-methods.index', compact('payments', $payments));
    }

    public function create()
    {
        return view('admin.payment-methods.new');
    }

    public function store(AdminStorePaymentMethod $request)
    {
        $payment = PaymentMethod::create($request->all());
        return redirect()->route('admin.payment-methods.index')
                ->with('success', 'Método de pago guardada correctamente.');
    }

    public function edit($id)
    {
        $payment = PaymentMethod::find($id);
        return view('admin.payment-methods.edit')
                ->with('payment', $payment);
    }

    public function update(Request $request, $id)
    {
        PaymentMethod::where('id', $id)
                ->update($request->except('_token'));
        return redirect()
                ->route('admin.payment-methods.index')
                ->with('success', 'Método de pago actualizada correctamente.');
    }

    public function delete($id)
    {
        $payment = PaymentMethod::find($id);
        $payment->delete();
        return redirect()
                ->route('admin.payment-methods.index')
                ->with('success', 'Método de pago eliminada correctamente.');
    }

    public function status(Request $request)
    {
        $id = $request->input('id');
        $payment = PaymentMethod::find($id);
        if ($payment != "") 
        {
            $payment->status = $payment->status ? 0 : 1;
            $payment->save();
        }
        return redirect()
                ->route('admin.payment-methods.index')
                ->with('success', 'Método de pago actualizada correctamente.');
    }
}
