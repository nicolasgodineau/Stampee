{{ include('header.php', {title: 'Ajout',pageHeader: 'Ajout enfant sur la liste'})}}
<div class="pageDeDroite">
    <span class="error">{{ errors|raw }}</span>
    <form class="formAjout" action="{{path}}book/store" method="post">
        <input type="hidden" name="mereNoel_idMereNoel" value="1">
        <ul>
            <li><strong>Nom : </strong><input type="text" name="nom" value="{{enfant.nom}}"></li>
        </ul>
        <ul>
            <li><strong>Prénom : </strong><input type="text" name="prenom" value="{{enfant.prenom}}">
            </li>
        </ul>
        <ul>
            <li><strong>pays : </strong><input type="text" name="pays" value="{{enfant.pays}}"></li>
        </ul>
        <ul>
            <li>
                <input type="submit" value="Ajouter à la liste">
            </li>
        </ul>
    </form>
</div>
</div>
</main>
</body>

</html>