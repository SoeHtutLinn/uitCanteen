
function change(id,key,qty)
{

	total(id);
	count(id);
	var container = $("#Shop"+id);
	var cookieQty = getCookie('quantity'+id).split(',');
	cookieQty[key] = container.find('#shopvoc-item'+key).find('#menuQty').val();
	setCookie('quantity'+id, cookieQty, 1);
}

function remove(id,key,m_id)
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
	var cookieQty = getCookie('quantity'+id).split(',');
	var cookieMenu = getCookie('menu'+id).split(',');

	cookieQty.splice(cookieMenu.indexOf(m_id),1);
	cookieMenu.splice(cookieMenu.indexOf(m_id),1);
	setCookie('quantity'+id, cookieQty, 1);
	setCookie('menu'+id, cookieMenu, 1);
}		
		
function total(id) 
{
	 	var total = 0;
		var container = $("#Shop"+id);

		container.children().each(function(){

		var quantity = Number($(this).find('#menuQty').val());
		var price = Number($(this).find('#price').text() );
		total = Number((total+price * quantity));
		
		$("#Menu"+id).find('#money').text(total);
		});
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

				var quantity = Number($(this).find('#menuQty').val());
				var price = Number($(this).find('#price').text() );
				alert("quant="+quantity);
				alert("price="+price);
				total[a] = Number((total[a]+price * quantity));
				alert(total[a]);
				$("#Menu"+a).find('#money').text(total[a]);
				$("#Menu"+a).find('#total'+a).val(total[a]);

		});
	};

});




