$(function(){
	var deptlist = $("#deptlist");
	deptlist.sortable({
		update: function(){
			var list = $(this).children('li');
			var i;
			for(i=1;i<=list.length;i++){
				list.eq(i-1).find('span').html(i+"");
			}
		}
	});
	deptlist.sortable('option','update').call(deptlist);
	$("#confirmbutton").click(function(){
		var list = deptlist.children('li');
		var selectlist = $('#selectlist');
		var confirmlist = $("#confirmlist");
		confirmlist.html("");
		selectlist.attr('value',deptlist.sortable("toArray"));
		for(i=1;i<=list.length;i++){
			confirmlist.append('<li>'+list.eq(i-1).children('a').html()+'</li>')
			var old = selectlist.attr('value');
		}
	});
});