// create an array with nodes


  var nodes = new vis.DataSet([

    { id: 98, label: 'RICARDO ROJAS CRUZ', likes: 2512, group: 'start' },
    { id: 0, label: '10.10.165.225', likes: 2512, group: 'end' },
    { id: 1, label: '10.10.165.220', likes: 2512, group: 'end' },
    { id: 58, label: '10.10.165.30', likes: 2512, group: 'end' },

  ]);

  // create an array with edges
  var edges = new vis.DataSet([
  { from: 98, to: 0 },
  { from: 98, to: 1 },
  { from: 98, to: 58 },
  ]);

  // create a network
  var container = document.getElementById('mynetwork');

  var data = {

    nodes: nodes,
    edges: edges
  };
  var options = {
    nodes: {
      // margin: 110,
      shape: 'circle',
      font: {
        size: 11,
        color: 'white',
      },
      mass: 0.5,
      // scaling: {
      //     label: {
      //         enabled: true,
      //         min: 20,
      //         max: 20
      //     },
      // },
      widthConstraint: 80,
    },
    edges: {
      smooth: false,
      arrows: {
        to: {
          enabled: true,
        },
      },
      physics: false,
    },
    interaction:{tooltipDelay:3600000, hover: true},
    layout: {
      improvedLayout: false,
      hierarchical: {
        enabled: false,
        sortMethod: 'directed'
      },

    },
    physics: { // TODO: adaptive physics settings based on size of graph rendered
      enabled: true,
      adaptiveTimestep: true,
      // stabilization: {
      // 	iterations: 100000,
      // 	fit: true
      // },
      barnesHut: {
        avoidOverlap: 0.8
      },
    },
    groups: {
      'start': {
        // shape: 'circle',
        title: null,
        color:{
          border:'#009688',
          background:'#009688',
          highlight:{ background:'#202443',border:'#202443'},
        },
        shadow:{
          enabled: true,
          color: 'rgba(94, 105, 119, 0.5)',
          size:10,
          x:0,
          y:3
        },
        // font: {
        //     size: 59
        // },
        margin: 10,
        // padding: 10
      }
    }
  };
  var network = new vis.Network(container, data, options);
