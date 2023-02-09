<div class="h-100 container-fluid">
    <div class="h-100 row d-flex align-items-stretch">

        <div class="col-12 col-md-7 col-lg-6 col-xl-5 d-flex align-items-start flex-column px-vw-5">

            <div class="mb-auto col-12">
                <form class="row" action="./index.php" method="post">
                    <div class="col-12">
                        <div class="form-check mb-3">
                            <? for ($i=1; $i <= 50 ; $i++) { ?>
                                <input class="oculto" type="checkbox" name="numeros[]" value="<?echo $i?>" id="<?echo $i?>" <?
                                if(isset($_SESSION['numeros'])){
                                    if (in_array($i,$_SESSION['numeros'])){
                                        echo ' checked';
                                    }
                                }?>>
                                <label class="<??>" for="<?echo $i?>">
                                  <? echo $i?>
                                </label>
                            <?}?>
                        </div>
                        <?if (isset($_SESSION['errorApuesta'])){?>
                            <div class="invalid-feedback"><? echo $_SESSION['errorApuesta']?> </div>
                        <?}?>
                        <!--SUBMIT-->
                        <?if(!sorteado()){?>
                            <? if(isset($_SESSION['numeros'])){?>
                                <input type="submit" class="btn btn-white btn-xl mb-4" name="editar" value="Editar apuesta">
                            <?}else{?>
                                <input type="submit" class="btn btn-white btn-xl mb-4" name="apostar" value="Apostar">
                            <?}?>
                        <?}?>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>