<div class="container mt-5">
    
    <div class="row pt-3">
        <div class="col-9"><h2>Liste des continents</h2></div>
        <div class="col-3"><a href="index.php?uc=continent&action=add" class='btn btn-success'><i class="fas fa-plus-circle"></i> Créer un continent</a> 
    </div>
    
    <form id="formRecherche" action="" method="get" class="border border-primary rounded p-3 mt-3 mb-3">
    <div class="row">
            <div class="col">
                <input type="text" class='form-control' id='libelle' onInput="document.getElementById('formRecherche').submit()" placehoder='Saisir le libellé' name='libelle' value="<?php echo $libelle; ?>">
            </div>
            <div class="col">
                <select name="continent" class="form-control" onChange="document.getElementById('formRecherche').submit()">
                        <?php 
                        echo "<option value='Tous'>Tous les continents</option>";
                        foreach($lesContinents as $continent){
                            $selection=$continent->getNum() == $continentSel ? 'selected' : '';
                            echo "<option value='".$continent->getNum()."' $selection>".$continent->getLibelle()."</option>";
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
    foreach($lesContinents as $continent){
        echo "<tr class='d-flex'>";
        echo "<td class='col-md-2'>".$continent->getNum()."</td>";
        echo "<td class='col-md-8'>".$continent->getLibelle()."</td>";
        echo "<td class='col-md-2'>
            <a href='index.php?uc=continent&action=update&num=".$continent->getNum()."' class='btn btn-primary'><i class='fas fa-pen'></i></a>
            <a href='#modalSuppression' data-toggle='modal' data-message='Voulez vous supprimer le continent ?' data-suppression='index.php?uc=continent&action=delete&num=".$continent->getNum()."' class='btn btn-danger'><i class='far fa-trash-alt'></i></a>
        </td>";
        echo "</tr>";
    }

    ?>
        
    </tbody>
    </table>

</div>
 