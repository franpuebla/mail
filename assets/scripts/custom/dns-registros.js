var DnsRegistros = function () {

    return {

        //main function to initiate the module
        init: function () {
            function restoreRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);

                for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                    oTable.fnUpdate(aData[i], nRow, i, false);
                }

                oTable.fnDraw();
            }

            function editRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);
				//Armado de cadena para el select
				var tiposderegistros = ['A', 'AAAA', 'CNAME', 'HINFO', 'MX', 'NAPTR', 'NS', 'PTR', 'SOA', 'SPF', 'SRV', 'SSHFP', 'TXT', 'RP'];
				var tagselect = '';
				tagselect = '<select class="form-control input-small">';
				for (var i=0; i<tiposderegistros.length; i++){
					tagselect += '<option ';
					if (aData[1] == tiposderegistros[i]){
						tagselect += 'selected ';
					}
					tagselect += 'value="'+ tiposderegistros[i] +'">'+ tiposderegistros[i] +'</option>';
				}
				tagselect += '</select>';

                jqTds[0].innerHTML = '<input type="text" class="form-control input-big" value="' + aData[0] + '">';
				jqTds[1].innerHTML = tagselect;
				jqTds[2].innerHTML = '<input type="text" class="form-control input-big" value="' + aData[2] + '">';
				jqTds[3].innerHTML = '<input type="text" class="form-control input-big" value="' + aData[3] + '">';
				jqTds[4].innerHTML = '<input type="text" class="form-control input-big" value="' + aData[4] + '">';
				jqTds[5].innerHTML = '<a class="edit" href="">Guardar</a>';
                jqTds[6].innerHTML = '<a class="cancel" href="">Cancelar</a>';
				jqTds[7].innerHTML = '<input disabled type="text" class="form-control input-big" value="' + aData[7] + '">';
				jqTds[7].style.display = 'none'; //Esconde la columna id al crear nuevo registro.
            }

            function saveRow(oTable, nRow) {
				var jqTds = $('>td', nRow);
                var jqInputs = $('input', nRow);
				var jqSelects = $('select', nRow);

				//IMPLEMENTAR FUNCION AJAX DE GUARDADO ACÁ
				//Deshabilitamos el botón enviar y colocamos el loader
				jqTds[5].innerHTML = '<img src="assets/img/loading.gif">';

				var formData = {
					'nombre' 			: jqInputs[0].value,
					'tipo' 				: jqSelects[0].value,
					'valor' 			: jqInputs[1].value,
					'prioridad' 		: jqInputs[2].value,
					'ttl' 				: jqInputs[3].value,
					'id' 				: jqInputs[4].value
				};

				$.ajax({
					type 		: 'POST',
					url 		: 'creareditarregistro.php',
					data 		: formData,
					dataType 	: 'json'
				}).done(function(data){

					//Si hubo un error
					if ( !data.success) {
						//Volvemos a la normalidad el botón guardar
						jqTds[5].innerHTML = '<a class="edit" href="">Guardar</a>';

						if (data.errors.errordb) {
							alert(data.errors.errordb);
						}
						if (data.errors.nombre) {
							alert(data.errors.nombre);
						}
						if (data.errors.tipo) {
							alert(data.errors.tipo);
						}
						if (data.errors.valor) {
							alert(data.errors.valor);
						}
						if (data.errors.ttl) {
							alert(data.errors.ttl);
						}

					} else {

						// Si todo está bien
						//Si fue un registro nuevo
						if (data.nuevo) {
							//alert("Registro agregado con éxito id: "+data.nuevoid);
							oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
							oTable.fnUpdate(jqSelects[0].value, nRow, 1, false);
							oTable.fnUpdate(jqInputs[1].value, nRow, 2, false);
							oTable.fnUpdate(jqInputs[2].value, nRow, 3, false);
							oTable.fnUpdate(jqInputs[3].value, nRow, 4, false);
							oTable.fnUpdate('<a class="edit" href="">Editar</a>', nRow, 5, false);
							oTable.fnUpdate('<a class="delete" href="">Eliminar</a>', nRow, 6, false);
							oTable.fnUpdate(data.nuevoid, nRow, 7, false);
							oTable.fnDraw();
						}else{
							//alert("Registro modifcado con éxito");
							oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
							oTable.fnUpdate(jqSelects[0].value, nRow, 1, false);
							oTable.fnUpdate(jqInputs[1].value, nRow, 2, false);
							oTable.fnUpdate(jqInputs[2].value, nRow, 3, false);
							oTable.fnUpdate(jqInputs[3].value, nRow, 4, false);
							oTable.fnUpdate('<a class="edit" href="">Editar</a>', nRow, 5, false);
							oTable.fnUpdate('<a class="delete" href="">Eliminar</a>', nRow, 6, false);
							oTable.fnUpdate(jqInputs[4].value, nRow, 7, false);
							oTable.fnDraw();
						}

					}
				}).fail(function(data) {
					//Volvemos a la normalidad el botón guardar
					jqTds[5].innerHTML = '<a class="edit" href="">Guardar</a>';
					alert('Fallo de comunicación AJAX');
				});



            }

            function cancelEditRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
				var jqSelects = $('select', nRow);
                oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
				oTable.fnUpdate(jqSelects[0].value, nRow, 1, false);
				oTable.fnUpdate(jqInputs[1].value, nRow, 2, false);
				oTable.fnUpdate(jqInputs[2].value, nRow, 3, false);
				oTable.fnUpdate(jqInputs[3].value, nRow, 4, false);
                oTable.fnUpdate('<a class="edit" href="">Editar</a>', nRow, 5, false);
				oTable.fnUpdate(jqInputs[4].value, nRow, 7, false);
                oTable.fnDraw();
            }

            var oTable = $('#dns_registros').dataTable({
                "aLengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "Todos"] // change per page values here
                ],
                // set the initial value
                "iDisplayLength": 15,

                "sPaginationType": "bootstrap",
                "oLanguage": {
									"sProcessing":     "Procesando...",
									"sLengthMenu":     "_MENU_ registros por página",
									"sZeroRecords":    "No se encontraron resultados",
									"sEmptyTable":     "Ningún dato disponible en esta tabla",
									"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
									"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
									"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
									"sInfoPostFix":    "",
									"sSearch":         "Buscar:",
									"sUrl":            "",
									"sInfoThousands":  ",",
									"sLoadingRecords": "Cargando...",
									"oPaginate": {
										"sFirst":    "Primero",
										"sLast":     "Último",
										"sNext":     "Siguiente",
										"sPrevious": "Anterior"
									},
									"oAria": {
										"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
										"sSortDescending": ": Activar para ordenar la columna de manera descendente"
									}
								},
                "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [0]
                    }
                ]
            });

            jQuery('#dns_registros_wrapper .dataTables_filter input').addClass("form-control input-medium input-inline"); // modify table search input
            jQuery('#dns_registros_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
            jQuery('#dns_registros_wrapper .dataTables_length select').select2({
                showSearchInput : false //hide search box with special css class
            }); // initialize select2 dropdown

            var nEditing = null;

            $('#dns_registros_new').click(function (e) {
                e.preventDefault();

                if (nEditing) {
                    if (confirm("Todavía no guarda la fila que está editando. Desea guardarla?")) {
                        saveRow(oTable, nEditing); // save
                    } else {
                        oTable.fnDeleteRow(nEditing); // cancel
                    }
                }

                var aiNew = oTable.fnAddData(['', '', '', '', '', '', '', '']);
                var nRow = oTable.fnGetNodes(aiNew[0]);
                editRow(oTable, nRow);
                nEditing = nRow;
            });

            $('#dns_registros a.delete').live('click', function (e) {
                e.preventDefault();

                if (confirm("Está seguro que desea eliminar el registro?") == false) {
                    return;
                }

                var nRow = $(this).parents('tr')[0];
								var jqTds = $('>td', nRow);
								var aData = oTable.fnGetData(nRow);
								//IMPLEMENTAR FUNCION AJAX DE BORADO ACÁ
								//Deshabilitamos el botón enviar y colocamos el loader
								jqTds[6].innerHTML = '<img src="assets/img/loading.gif">';

								var formData = {
									'id' 				: aData[7]
								};

								$.ajax({
									type 		: 'POST',
									url 		: 'eliminarregistros.php',
									data 		: formData,
									dataType 	: 'json'
								}).done(function(data){

									//Si hubo un error
									if ( !data.success) {
										//Volvemos a la normalidad el botón Eliminar
										jqTds[6].innerHTML = '<a class="delete" href="">Eliminar</a>';

										if (data.errors.errordb) {
											alert(data.errors.errordb);
										}
										if (data.errors.id) {
											alert(data.errors.id);
										}

									} else {

										// Si todo está bien
										//alert("Registro eliminado con éxito");
										oTable.fnDeleteRow(nRow);

									}
								}).fail(function(data) {
									//Volvemos a la normalidad el botón guardar
									jqTds[6].innerHTML = '<a class="edit" href="">Eliminar</a>';
									alert('Fallo de comunicación AJAX');
								});

                //alert("Deleted! Do not forget to do some ajax to sync with backend :)");
            });

            $('#dns_registros a.cancel').live('click', function (e) {
                e.preventDefault();
                if ($(this).attr("data-mode") == "new") {
                    var nRow = $(this).parents('tr')[0];
                    oTable.fnDeleteRow(nRow);
                } else {
                    restoreRow(oTable, nEditing);
                    nEditing = null;
                }
            });

            $('#dns_registros a.edit').live('click', function (e) {
                e.preventDefault();

                /* Get the row as a parent of the link that was clicked on */
                var nRow = $(this).parents('tr')[0];

                if (nEditing !== null && nEditing != nRow) {
                    /* Currently editing - but not this row - restore the old before continuing to edit mode */
                    restoreRow(oTable, nEditing);
                    editRow(oTable, nRow);
                    nEditing = nRow;
                } else if (nEditing == nRow && this.innerHTML == "Guardar") {
                    /* Editing this row and want to save it */
                    saveRow(oTable, nEditing);
                    nEditing = null;
                    //alert("Updated! Do not forget to do some ajax to sync with backend :)");
                } else {
                    /* No edit in progress - let's start one */
                    editRow(oTable, nRow);
                    nEditing = nRow;
                }
            });
        }

    };

}();