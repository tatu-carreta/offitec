<style>
    .my-drop-zone { border: dotted 3px lightgray; }
    .nv-file-over { border: dotted 3px red; } /* Default class applied to drop zones on over */
    .another-file-over-class { border: dotted 3px green; }
    /*
        html, body { height: 100%; }
    
        canvas {
            background-color: #f3f3f3;
            -webkit-box-shadow: 3px 3px 3px 0 #e3e3e3;
            -moz-box-shadow: 3px 3px 3px 0 #e3e3e3;
            box-shadow: 3px 3px 3px 0 #e3e3e3;
            border: 1px solid #c3c3c3;
            height: 100px;
            margin: 6px 0 0 6px;
        }*/
</style>



<div class="row" id="ng-app" ng-app="app">
    <div ng-controller="GaleriaUpload" nv-file-drop="" uploader="uploader" filters="queueLimit, customFilter, sizeLimit">
        <div class="col-md-12">
            <div class="row marginBottom2">
                <div class="col-md-2">
                    <label class="btn btn-primary" style="width:100%"> Seleccionar archivo
                        <span>
                            <input id="fileInput" type="file" nv-file-select="" uploader="uploader"  class="oculto file imagen" data="1" multiple/>
                        </span>
                    </label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="url-archivo1 form-control" value="<% nombres_archivos %>">
                    <input type="hidden" ng-model="url_public" ng-init="url_public = '{{URL::to('/')}}'">
                </div>
            </div>
            <div class="row">
                <div ng-repeat="item in uploader.queue" class="imgSeleccionadas">
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <div class="divCargaImg">
                                <div ng-show="uploader.isHTML5" ng-thumb="{ file: item._file, height: 255.5 }" class="marginBottom1">
                                    
                                </div>
                                <i ng-click="removeItem(item)" class="fa fa-times-circle fa-lg"></i>
                            </div>

                            <div class="progress marginBottom1">
                                <div class="progress-bar" role="progressbar" ng-style="{ 'width': item.progress + '%' }"></div>
                            </div>
                            <span ng-show="item.isSuccess"><i class="glyphicon glyphicon-ok"></i></span>
                            <span ng-show="item.isCancel"><i class="glyphicon glyphicon-ban-circle"></i></span>
                            <span ng-show="item.isError"><i class="glyphicon glyphicon-remove"></i></span>
                            <textarea class="form-control" id="epigrafe" name="epigrafe_slide[]" max-lenght="100"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nombre-peso marginBottom2">
                <div>
                    <div>
                        Progreso de carga
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" ng-style="{ 'width': uploader.progress + '%' }"></div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-s marginRight5" ng-click="uploader.uploadAll()" ng-disabled="!uploader.getNotUploadedItems().length">
                        Guardar Imágenes
                    </button>
                    <button type="button" class="btn btn-default btn-s" ng-click="removeTodos()" ng-disabled="!uploader.queue.length">
                        Eliminar
                    </button>
                </div>

            </div>
        </div><!-- cierra col-md-6 -->
        

        <div ng-repeat="imagen in imagenes_seleccionadas">
            <input type="hidden" name="imagenes_slide[]" value="<% imagen.imagen_slide %>">
        </div>

    </div>
</div>


