const masonryLayout = (containerElem, itemsElems, columns) => {
            containerElem.classList.add('masonry-layout', "columns-".concat(columns));
            var columnsElements = [];

            for (var i = 1; i <= columns; i++) {

                var column = document.createElement('div');
                column.classList.add('masonry-column', "column-".concat(i));
                containerElem.appendChild(column);
                columnsElements.push(column);
            }

            for(var k=0; k < itemsElems.length ; k++){
                var item = itemsElems[k];       
                columnsElements[(k%columns)].appendChild(item);    
                item.classList.add('masonry-item');
            }
            /*for (var m = 0; m < Math.ceil(itemsElems.length / columns); m++) {


                for (var n = 0; n < columns; n++) {

                    var item = itemsElems[m * columns + n];
                    columnsElements[n].appendChild(item);
                    item.classList.add('masonry-item');
                }
            }*/
        };

        masonryLayout(document.getElementById('gallery'), document.querySelectorAll('.gallery-item'), 4);