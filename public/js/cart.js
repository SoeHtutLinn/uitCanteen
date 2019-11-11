
function change(id,key,shopKey)
{

	total(shopKey);
	var container = $("#Shop"+shopKey);

	var cookieQty = getCookie('quantity'+id).split(',');
	cookieQty[key] = container.find('#shopvoc-item'+key).find('#menuQty').val();
	setCookie('quantity'+id, cookieQty, 1);

	var quantity = 0;
	container.children().each(function()
	{
		quantity += Number($(this).find('#menuQty').val()) || 0;

	});
}

function qtyChange(shopKey,key)
{

	var container = $("#Shop"+shopKey);
	var quantity = 0;
	container.children().each(function()
	{
		
		quantity += Number($(this).find('#menuQty').val()) || 0;

	});

	container.find('#shopvoc-item'+key).find('select').empty();
	
	if(quantity<6)
	{
		var qtyDetail = container.find('#shopvoc-item'+key).find('#menuQty').val();
		var reqQty = 5-(quantity - qtyDetail);
		console.log(reqQty);

		for(var i = 1; i<= reqQty; i++ )
		{

			container.find('select').append("<option value='"+i+"'>"+i+"</option>");
		
			
		}
	}
		


}

function remove(id,key,m_id,shopId)
{

	var container = $("#Shop"+id);
	container.find('#shopvoc-item'+key).hide();
	container.find('#shopvoc-item'+key).find('#menuQty').val(0);
	total(id);
	var amount = Number($("#Menu"+id).find('#money').text());


	alert(amount);
	if(amount == 0)
	{
		$('#Menu'+id).hide();
	}
	var cookieQty = getCookie('quantity'+shopId).split(',');
	var cookieMenu = getCookie('menu'+shopId).split(',');

	cookieQty.splice(cookieMenu.indexOf(m_id),1);
	cookieMenu.splice(cookieMenu.indexOf(m_id),1);
	setCookie('quantity'+shopId, cookieQty, 1);
	setCookie('menu'+shopId, cookieMenu, 1);
}		
		
function total(id) 
{
		
	 	var total = 0;
		var container = $("#Shop"+id);

		container.children().each(function(){

		var quantity = Number($(this).find('#menuQty').val()) || 0;
		var price = Number($(this).find('#price').text() );
		total = Number((total+price * quantity));
		
		$("#Menu"+id).find('#money').text(total);
		});
		$("#Menu"+id).find('#total'+id).val(total);
}

function count(id)
{

	var qty = 0;
	var container = $("#Shop"+id);
	container.children().each(function(){
	qty += Number($(this).find('#menuQty').val());
	});
	
	container.find('select').find('option').not(':selected').remove();
	for (var i = 1; i <= (5-qty); i++) {
		alert(i);
		container.find('select').append("<option value='"+i+"'>"+i+"</option>");
	}

}


		

	
$(document).ready(function(){	
	
		var form = $('#form');
		var total = new Array();

		for(var a=0; a<=($("#shopcount").val());a++) {

				//var shop = $(this).find(".shopvoc-header").find("h3").text();
			 	total[a] = 0;
				var container = $("#Shop"+a);

				container.children().each(function(){

				var quantity = Number($(this).find('#menuQty').val()) || 0;
				var price = Number($(this).find('#price').text() );
				
				total[a] = Number((total[a]+ price * quantity));
				
				
				$("#Menu"+a).find('#money').text(total[a]);
				$("#Menu"+a).find('#total'+a).val(total[a]);

		});
	};

});




