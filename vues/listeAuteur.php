<div class="container mt-5">
    <div class="row pt-4">
    <div class="col-9"><h2>Liste des Auteurs</h2></div>
    <div class="col-3"><a href="index.php?uc=auteur&action=add" class='btn btn-success'><i class="fas fa-plus-circle"></i> Ajouter un Auteur</a></div>
</div>

<form action="index.php?uc=auteur&action=list" method="post" class="border border-primary rounded p-3">
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" id="libelle" placeholder="Saisir le libellé" name="libelle"  value= "<?php $libelle; ?>">
        </div>
        <div class="col">
            <select name="continent" class="form-control" onChange="document.getElementById('formRecherche').submit()">
                <?php      
                echo "<option value='Tous'> Tous les continents</option>";
                foreach($lesContinents as $continent){
                    
                    $selection = $continent->getNum() == intval($continentSel) ? 'selected' : '';
                    echo "<option value='" . $continent->getNum() . "' ". $selection." >". $continent->getLibelle() ."</option>";
                }
                ?>
            </select>
        </div>
        <div class="col">
            <button type="submit" class="btn btn-success btn-block">Rechercher</button>
        </div>
    </div>
</form>   
<br>

     
        <table class="table table-hover table-striped">
        <thead class="thead-dark">
        <tr class="d-flex">
            <th scope="col" class="col-md-1">Numéro</th>
            <th scope="col" class="col-md-3">Nom</th>
            <th scope="col" class="col-md-3">Prénom</th>
            <th scope="col" class="col-md-3">Nationalité</th>
            <th scope="col" class="col-md-2">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach($lesAuteurs as $auteur)
          {
              echo "<tr class='d-flex'>";
              echo "<td class='col-md-1'>$auteur->num</td>";
              echo "<td class='col-md-3'>$auteur->nomA</td>";
              echo "<td class='col-md-3'>$auteur->prenomA</td>";
              echo "<td class='col-md-3'>$auteur->libNatio</td>";
              echo "<td class='col-md-2'><a href='index.php?uc=auteur&action=update&num=$auteur->num' class='btn btn-primary'><i class='fas fa-pen'></i></a>
                    <a href='#modalSuppr' data-toggle='modal' data-message='Voulez-vous supprimer cette auteur ?' data-suppr='index.php?uc=auteur&action=delete&num=$auteur->num' class='btn btn-danger'><i class='far fa-trash-alt'></i></a></td>";
              echo "</tr>";
          }
          ?>
        </tbody>  
    </table>
</div>

<!--checke-->