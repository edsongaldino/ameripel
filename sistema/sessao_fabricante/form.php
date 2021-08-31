
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Nome da fabricante</label>
                                        <div class="col-sm-4">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <input type="text" name="nome_fabricante" class="form-control" value="<?php echo $fabricante["nome_fabricante"];?>" required="required">
                                                <span class="help-block">Título (Não usar aspas)</span>
                                            </div>
                                        </div>

                                        <label class="col-sm-2 label-on-left">Status</label>
                                        <div class="col-sm-4">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <select class="form-control" name="status" id="status">
                                                    <option value="L" <?php if($fabricante["status"] == 'L'){echo "selected";}?>>Liberado</option>
                                                    <option value="B" <?php if($fabricante["status"] == 'B'){echo "selected";}?>>Bloqueado</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Descrição Área de Atuação</label>
                                        <div class="col-sm-10">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <input type="text" name="area_atuacao" class="form-control" value="<?php echo $fabricante["area_atuacao"];?>" required="required">
                                                <span class="help-block">Área de Atuação (Não usar aspas)</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <legend class="col-sm-2 label-on-left">Logo da fabricante</legend>
                                        <div class="col-sm-4">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <?php if($fabricante["arquivo"]):?>
                                                <img src="../../conteudos/fabricante/<?php echo $fabricante["arquivo"];?>" alt="...">
                                                <?php else:?>
                                                <img src="../../sistema/assets/img/image_placeholder.jpg" alt="...">
                                                <?php endif;?>
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-rose btn-round btn-file">
                                                    <span class="fileinput-new">Selecione a imagem</span>
                                                    <span class="fileinput-exists">Alterar</span>
                                                    <input type="file" name="arquivo" />
                                                </span>
                                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remover</a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>