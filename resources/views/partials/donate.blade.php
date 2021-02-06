@extends('main')

@section('content')
    <form action="/payment" method="post">
        <select id="points" name="points">
            <option value="275">R$ 4,99 -> 250RC</option>
            <option value="480">R$ 9,99 -> 550RC</option>
            <option value="1000">R$ 19,99 -> 1250RC</option>
            <option value="1250">R$ 24,99 -> 1600RC</option>
			<option value="100">R$ 39,99 -> 2700RC</option>
            <option value="200">R$ 49,99 -> 3600RC</option>
            <option value="500">R$ 99,99 -> 8000RC</option>
            <option value="1000">R$ 149,99 -> 13000RC</option>
			<option value="100">R$ 249,99 -> 25000RC</option>            

            <input type="submit" value="submit">
        </select>
    </form>
@endsection









