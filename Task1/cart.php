<!doctype html>
<html lang="en">
  <head>
	<title>Shopping Cart</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

  <body>

	<div class="container mt-4">
		<div class="row">
			<div class="col-12">
				<div class="card text-left">
				  <div class="card-body">
					<h4 class="card-title">Shopping Cart</h4>

					<button class="btn btn-secondary mb-2 float-right"  onclick="set_session()">Reset Session</button>
				
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Serial</th>
								<th>Product Name</th>
								<th>Quantity</th>
								<th>Unit Price</th>
								<th>Subtotal</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="data_table_body">
							<!-- Appended Values -->
						</tbody>
					</table>
					
				  </div>
				</div>
			</div>
		</div>
	</div>


	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



	<script>
		// Get Previous All Data from Session
		get_data();

		// Set Session Data
		function set_session(){
			const array = 
				[
					{name: 'Apple', quantity: 1, unit_price: 80},
					{name: 'Mango', quantity: 1, unit_price: 150},
					{name: 'Banana', quantity: 5, unit_price: 80},
					{name: 'Watermelon', quantity: 1, unit_price: 80}
				]

				// Store Data into Session
				sessionStorage.setItem('carts', JSON.stringify(array));
				get_data(); 
		}

		// Getting Session Data
		function get_data(){

			const session = JSON.parse(sessionStorage.getItem('carts'));
		
			$('#data_table_body').html('')

			session.forEach(function(val, index){
				$('#data_table_body').append(
					`<tr id='cart_tr_${index}'>
						<td scope='row'>${index + 1}</td>
						<td>${ val.name }</td>
						<td> 
							<input type='number' onchange='quantity_update(${index}, ${val.unit_price})' name='quantity' id='quantity_${index}' value='${val.quantity}'>
						</td>
						<td>${val.unit_price}</td>

						<td id='cart_subtotal_${index}'> ${val.quantity * val.unit_price}</td>
						<td> 
							<button onclick="delete_item(${index})" class='btn btn-danger'>Delete</button>	
						</td>
					</tr>
				`)
			})

		}

		function quantity_update(key, item_price){

			const val = document.getElementById(`quantity_${key}`).value
			const subtotal = val * item_price
			const tr =  document.getElementById(`cart_subtotal_${key}`).innerHTML = subtotal;
			const arr = JSON.parse(sessionStorage.getItem('carts'))
			arr[key].quantity = val
			sessionStorage.setItem('carts', JSON.stringify(arr));
		}

		function delete_item(key){
			
			const val = document.getElementById(`cart_tr_${key}`).remove();
			const arr = JSON.parse(sessionStorage.getItem('carts'))

			arr.splice(key, 1);

			sessionStorage.setItem('carts', JSON.stringify(arr));
		}

	</script>

  </body>
</html>