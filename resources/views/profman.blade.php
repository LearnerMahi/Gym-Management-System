@extends('layout')

@section('title', 'profman')

@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        background-color: #fff;
        border-radius: 8px;
        padding: 30px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
    }

    label {
        font-weight: bold;
    }

    input[type="text"],
    input[type="date"],
    textarea,
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="radio"],
    input[type="checkbox"] {
        margin-right: 10px;
    }

    button[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }

    button[type="submit"]:hover {
        background-color: #45a049;
    }
</style>

<div class="container">
    <h1>Enter Payment Information</h1>
    <form action="{{ route('payments.store') }}" method="POST">

        @csrf
        <div>
            <label for="last_payment_date">Last Payment Date:</label><br>
            <input type="date" id="last_payment_date" name="last_payment_date">
        </div>
        <div>
            <label for="mobile_number">Mobile Number:</label><br>
            <input type="text" id="mobile_number" name="mobile_number">
        </div>
        <div>
            <label for="address">Address:</label><br>
            <textarea id="address" name="address"></textarea>
        </div>
        <div>
            <label for="gender">Gender:</label><br>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label>
        </div>
        <div>
            <label for="method">Payment Method:</label><br>
            <select id="method" name="method">
                <option value="bkash">Bkash</option>
                <option value="cash">Cash</option>
            </select>
        </div>
        <div>
            <!-- <input type="checkbox" id="status" name="status" value="1">
            <label for="status">Paid</label> -->
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</div>
@endsection
