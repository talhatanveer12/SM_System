<x-layout.layout>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <h2 class="text-center">Online Payment</h2>
            <form action="/send-online-payment" method="POST">
                @csrf
                <input type="hidden" name='student_id' value={{session('student_id')}}>
                <input type="hidden" name='fee_month' value={{session('fee_month')}}>
                <input type="hidden" name='total_fee' value={{session('total_fee')}}>
                <input type="hidden" name='fee_submit_amount' value={{session('fee_submit_amount')}}>
                <input type="hidden" name='fee_submit_date' value={{session('fee_submit_date')}}>
                <x-form.input name="phone" type="number" />
                <x-form.input name="cnic" type="number" />
                <button type="submit" class="btn btn-primary text-center">Payment</button>
            </form>
        </div>
        <div class="col-lg-4">

        </div>
    </div>
</x-layout.layout>
