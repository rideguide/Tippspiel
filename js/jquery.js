$(document).ready(function(){
	//anzeigen der Containers beim Start (Home)
	$("html").hide();
	$("#results").hide();
	$("#tipps").hide();
	$("#home").show();
	$("html").show();
	
	//Clicks auf Navigation und Anzeigen der Richtigen container
	$("#navHom").click(function(){
		$("#navHom").parent().prop("class", "active");
		$("#navRes").parent().prop("class", null);
		$("#navTip").parent().prop("class", null);
		
		$("#home").show();
		$("#results").hide();
		$("#tipps").hide();
	});
	
	$("#navRes").click(function(){
		$("#navHom").parent().prop("class", null);
		$("#navRes").parent().prop("class", "active");
		$("#navTip").parent().prop("class", null);
		
		$("#home").hide();
		$("#results").show();
		$("#tipps").hide();
		
	});
	
	$("#navTip").click(function(){
		$("#navHom").parent().prop("class", null);
		$("#navRes").parent().prop("class", null);
		$("#navTip").parent().prop("class", "active");
		
		$("#home").hide();
		$("#results").hide();
		$("#tipps").show();
	});
	
	$("#navLog").click(function(){
		
	});
	
	$("#selectRes").change(function(){
		var selected = $("#selectRes option:selected").val();
	
		var rows = $(".resultTable tr").each(function(){
			var row = $(this);
			var current = $(row).attr("value");
			
			if(selected == current){
				row.show();
			} else if(selected == "All"){
				row.show();
			} else{
				row.hide();
			}
		});
	});
	
	
	$("#teamInput").keyup(function(){
		var input = $("#teamInput").val().toUpperCase();
		
		var rows = $(".resultTable tr").each(function(){
			var row = $(this);
			var bol = false;
			
			var columns = row.children('td');
			 $(columns).each(function(){
				var td = $(this).text().toUpperCase();
				
				if(td.indexOf(input) > -1){
					bol = true;
				}
				
			 });
				
			if(bol){
				row.show();
			} else {
				row.hide();
			}
			
		});
	});
});