{{ include('header.php', {title: 'Modification des informations ',pageHeader: 'Modification des informations '})}}
<div class="pageDeDroite">
    <form class="formUpdate" action="{{ path }}book/update" method="post">
        <input type="hidden" name="idEnfant" value="{{enfant.idEnfant}}">
        <input type="hidden" name="mereNoel_idMereNoel" value="{{enfant.mereNoel_idMereNoel}}">
        <ul>
            <li><strong>Nom : </strong><input type="text" name="nom" value="{{enfant.nom}}"></li>
        </ul>
        <ul>
            <li><strong>Prénom : </strong><input type="text" name="prenom" value="{{enfant.prenom}}">
            </li>
        </ul>
        <ul>
            <li><strong>Pays : </strong><input type="text" name="pays" value="{{enfant.pays}}"></li>
        </ul>
        <ul>
            <li>
                <input type="submit" value="Appliquer les modifications">
            </li>
        </ul>
    </form>
    <form class="formUpdate" action="{{ path }}book/delete" method="post">
        <ul>
            <li>
                <input type="hidden" name="id" value="{{enfant.idEnfant}}">
                <input type="submit" value="Supprimer de la liste">

            </li>
        </ul>
    </form>
</div>
</div>



</main>

</body>

</html>