<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
      src="{{ config('midtrans.snap_url') }}"
      data-client-key="{{ config('midtrans.client_key') }}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

    {{-- jquery CDN 3 buat ngambil js_callback --}}
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

	
    <title>Mathanan Restaurant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
   <style>
    body{
	background-color: #ffffff;
}
a {
    color: #F15412;
    text-decoration: none;
}
a:hover 
{
     color:#F15412; 
     text-decoration:none; 
     cursor:pointer;  
}
.container{
	width: 600px;
	background-color: #fff;
	padding-top: 100px;
    padding-bottom: 100px;

}
.card{
	background-color: #fff;
	width: 300px;
	border-radius: 15px;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.name{
	font-size: 15px;
	color: #403f3f;
	font-weight: bold;
}
.cross{
	font-size: 11px;
	color: #b0aeb7;
}
.pin{
	font-size: 14px;
	color: #b0aeb7;
}
.first{
	border-radius: 8px;
	border: 1.5px solid #F15412;
	color: #000;
	background-color: #eaf4ff;
}
.second{
	border-radius: 8px;
	border: 1px solid #acacb0;
	color: #000;
	background-color: #fff;
}
.dot{

}
.head{
	color: #F15412;
	font-size: 12px;
}
.dollar{
	font-size: 18px;
	color: #F15412;
}
.amount{
	color: #F15412;
	font-weight: bold;
	font-size: 18px;

}
.form-control{
	font-size: 18px;
	font-weight: bold;
	width: 60px;
	height: 28px;

}
.back{
	color: #aba4a4;
	font-size: 15px;
	line-height: 73px;
	font-weight: 400;
}
.button{
	width: 150px;
	height: 60px;
	border-radius: 8px;
	font-size: 17px;		
}

   </style>
    <div class="container d-flex justify-content-center mt-5">
	<div class="card">
		
		<div>
			<div class="d-flex pt-3 pl-3">
			{{-- <div><img src="https://img.icons8.com/ios-filled/50/000000/visa.png" width="60" height="80" /></div> --}}
		    </div>

        <div class="py-2  px-3">
          {{-- <div class="mt-3 pl-2"><span class="name">{{$name}}</span><div><span class="pin ml-2">{{$phonenumber}}</span></div></div> --}}
		    	<div class="second pl-2 d-flex py-2">
			    <div class="form-check">	
			    </div>
          <div class="border-left pl-2"><span class="head">Name</span><div class="d-flex"><span class="dollar"></span>{{ $name }}</div></div>

		         </div>
		    </div>

        <div class="py-2  px-3">
		    	<div class="first pl-2 d-flex py-2">
			    <div class="form-check">
			    </div>
			    <div class="border-left pl-2"><span class="head">Nomor Telepon</span><div><span class="dollar"></span><span class="amount">{{$phonenumber}}</span></div></div>

		         </div>
		    </div>

		    <div class="py-2  px-3">
		    	<div class="second pl-2 d-flex py-2">
			    <div class="form-check">
				
			    </div>
          <div class="border-left pl-2"><span class="head">Alamat</span><div class="d-flex"><span class="dollar"></span>{{ $address }}</div></div>
		         </div>
		    </div>

		     <div class="py-2  px-3">
		    	<div class="first pl-2 d-flex py-2">
			    <div class="form-check">
				
			    </div>
          <div class="border-left pl-2"><span class="head">Total amount due</span><div><span class="dollar">Rp.</span><span class="amount">{{$total_price}}</span></div></div>

		         </div> 
		    </div>	

		    	<div class="d-flex justify-content-between px-3 pt-4 pb-3">
		    		<a href="{{ route('menu.cart') }}"><div><span class="back">Go Back</span></div></a>
		    		<button type="button" id="pay-button" class="btn btn-warning button">Pay amount</button>
		    	</div>

		</div>
	</div>
</div>

    <form action="" id="submit_form" method="POST">
        @csrf
        {{-- ini biar data payment bisa masuk ke database, jadi kita akalin pake id "json_callback" yang di olah pake kodingan func
         send_response_to_form(result) --}}
        <input type="hidden" name="json" id="json_callback">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {

        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{$snapToken}}', {
          onSuccess: function(result){
            /* You may add your own implementation here */
            console.log(result);
            send_response_to_form(result);
          },
          onPending: function(result){
            /* You may add your own implementation here */
            console.log(result);
            send_response_to_form(result);
          },
          onError: function(result){
            /* You may add your own implementation here */
            console.log(result);
            send_response_to_form(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
        })
      });

      function send_response_to_form(result){
        //jadi masukan hasil result berbentuk JSON yang telah di ubah ke bentuk string oleh JSON.stringify, ke dalam value json_callback
        document.getElementById('json_callback').value = JSON.stringify(result);

        // //buat coba-coba
        // alert(document.getElementById('json_callback').value);

        //submit hasil nya ke hidden form melalui id "submit_form"
        $('#submit_form').submit();
      }
    </script>
</body>

</html>