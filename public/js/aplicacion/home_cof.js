function presentacionorganigramainindex(datoorgangma){
	$('#chart-container').orgchart({
        'data' : datoorgangma,
        'nodeContent': 'title',
        'verticalDepth': 3,
        'depth': 3
    });
}