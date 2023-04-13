<div class="container mt-5">
    
    <div class="row pt-3">
        <div class="col-9"><h2>Liste des Nationalite</h2></div>
        <div class="col-3"><a href="index.php?uc=nationalite&effet=add" class='btn btn-success'><i class="fas fa-plus-circle"></i> Créer une nationalite</a> 
    </div>
    
    <form id="formRecherche" action="" method="get" class="border border-primary rounded p-3 mt-3 mb-3">
    <div class="row">
            <div class="col">
                <input type="text" class='form-control' id='libelle' onInput="document.getElementById('formRecherche').submit()" placehoder='Saisir le libellé' name='libelle' value="<?php echo $libelle; ?>">
            </div>
            <div class="col">
                <select name="nationalite" class="form-control" onChange="document.getElementById('formRecherche').submit()">
                        <?php 
                        echo "<option value='Tous'>Tout les nationalite</option>";
                        foreach($lesNationalites as $nationalite){
                            $selection=$nationalite->getNum() == $nationaliteSel ? 'selected' : '';
                            echo "<option value='".$nationalite->getNum()."' $selection>".$nationalite->getLibelle()."</option>";
                        }
                        ?>
                </select>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-success btn-block"> Rechercher</button>
            </div> 
        </div>
    </form>

    <table class="table table-hover table-striped">
    <thead>
        <tr class="d-flex">
        <th scope="col" class="col-md-2">Numéro</th>
        <th scope="col" class="col-md-8">Libellé</th>
        <th scope="col" class="col-md-2">Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($lesNationalites as $nationalite){
        echo "<tr class='d-flex'>";
        echo "<td class='col-md-2'>".$nationalite->getNum()."</td>";
        echo "<td class='col-md-8'>".$nationalite->getLibelle()."</td>";
        echo "<td class='col-md-2'>
            <a href='index.php?uc=nationalite&effetn=update&num=".$nationalite->getNum()."' class='btn btn-primary'><i class='fas fa-pen'></i></a>
            <a href='#modalSuppression' data-toggle='modal' data-message='Voulez vous supprimer la nationalite ?' data-suppression='index.php?uc=nationalite&effet=delete&num=".$nationalite->getNum()."' class='btn btn-danger'><i class='far fa-trash-alt'></i></a>
        </td>";
        echo "</tr>";
    }

    ?>
        
    </tbody>
    </table>

</div>