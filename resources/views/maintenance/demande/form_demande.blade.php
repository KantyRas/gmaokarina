@extends('basefront')
@section('title', "Faire une demande")
@section('content')
@php
    $unites = [
        ['idUnite' => 1, 'unite' => 'Kg'],
        ['idUnite' => 2, 'unite' => 'Litre'],
        ['idUnite' => 3, 'unite' => 'Piece'],
    ];
    $articles = [
        ['idArticle' => 1, 'code' => 'ART001', 'designation' => 'Article 1', 'idUnite' => 1],
        ['idArticle' => 2, 'code' => 'ART002', 'designation' => 'Article 2', 'idUnite' => 2]
    ];
    foreach ($articles as $article) {
        $unite = collect($unites)->firstWhere('idUnite', $article['idUnite']);
        $article['idUnite'] = $unite ? $unite['unite'] : '';
    }
@endphp
    <div class="container">
        <h2 class="mb-4">Bon de Demande d'Achat</h2>
    <br>
        <form action="#" method="POST">
            @csrf
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Demandeur :</label>
                <div class="col-sm-4">
                    <input type="text" name="demandeur" class="form-control" required>
                </div>

                <label class="col-sm-2 col-form-label">Date :</label>
                <div class="col-sm-4">
                    <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                </div>
            </div>
            <br>
            <table class="table table-bordered align-middle" id="articlesTable">
                <thead class="table-light">
                <tr>
                    <th style="width: 5%">Item</th>
                    <th style="width: 20%">Code Article</th>
                    <th style="width: 40%">Désignation</th>
                    <th style="width: 10%">Quantité</th>
                    <th style="width: 15%">Unité</th>
                    <th style="width: 10%">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>
                        <select name="articles[0][idArticle]" class="form-control code-article-select" required>
                            <option value="">-- Choisir --</option>
                            @foreach($articles as $article)
                                <option value="{{ $article['idArticle'] }}">{{ $article['code'] }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="text" name="articles[0][designation]" class="form-control designation" readonly></td>
                    <td><input type="number" name="articles[0][quantite]" class="form-control" min="1" value="1" required></td>
                    <td><input type="text" name="articles[0][idUnite]" class="form-control unite" readonly></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-danger btn-sm removeRow" disabled>
                            <i class="fa fa-trash-o"></i>
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>

            <div class="d-flex justify-content-end align-items-center mb-4">
                <button type="button" id="ajouterLigne" class="btn btn-primary me-3">
                    <i class="fa fa-plus"></i> Ajouter un article
                </button>
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-save"></i> Enregistrer la demande
                </button>
            </div>

        </form>
    </div>

    <script>
        const listeArticles = @json($articles);
        let indiceLigne = 1;
        function mettreAJourIndices() {
            document.querySelectorAll('#articlesTable tbody tr').forEach((tr, i) => {
                tr.querySelector('td:first-child').textContent = i + 1;
                tr.querySelectorAll('select, input').forEach(input => {
                    let name = input.name;
                    if(name) {
                        input.name = name.replace(/\d+/, i);
                    }
                });
            });
        }
        function changementCodeArticle(select) {
            const idArticle = select.value;
            const tr = select.closest('tr');
            const article = listeArticles.find(a => a.idArticle == idArticle);
            if(article) {
                tr.querySelector('.designation').value = article.designation;
                tr.querySelector('.unite').value = article.idUnite;
            } else {
                tr.querySelector('.designation').value = '';
                tr.querySelector('.unite').value = '';
            }
        }
        document.getElementById('ajouterLigne').addEventListener('click', function() {
            const tableBody = document.querySelector('#articlesTable tbody');
            const newRow = document.createElement('tr');

            let optionsHtml = `<option value="">-- Choisir --</option>`;
            listeArticles.forEach(a => {
                optionsHtml += `<option value="${a.idArticle}">${a.code}</option>`;
            });
            newRow.innerHTML = `
            <td>${tableBody.children.length + 1}</td>
            <td>
                <select name="articles[${indiceLigne}][idArticle]" class="form-control code-article-select" required>
                    ${optionsHtml}
                </select>
            </td>
            <td><input type="text" name="articles[${indiceLigne}][designation]" class="form-control designation" readonly></td>
            <td><input type="number" name="articles[${indiceLigne}][quantite]" class="form-control" min="1" value="1" required></td>
            <td><input type="text" name="articles[${indiceLigne}][idUnite]" class="form-control unite" readonly></td>
            <td class="text-center">
                <button type="button" class="btn btn-danger btn-sm removeRow">
                    <i class="fa fa-trash-o"></i>
                </button>
            </td>
        `;
            tableBody.appendChild(newRow);
            indiceLigne++;
            mettreAJourIndices();
        });
        document.querySelector('#articlesTable').addEventListener('change', function(e) {
            if(e.target.classList.contains('code-article-select')) {
                changementCodeArticle(e.target);
            }
        });
        document.querySelector('#articlesTable').addEventListener('click', function(e) {
            if(e.target.closest('.removeRow')) {
                const rows = document.querySelectorAll('#articlesTable tbody tr');
                if(rows.length > 1) {
                    e.target.closest('tr').remove();
                    mettreAJourIndices();
                }
            }
        });
        // Au chargement de la page, on bind déjà les selects
        document.querySelectorAll('.code-article-select').forEach(select => {
            select.addEventListener('change', () => changementCodeArticle(select));
        });
    </script>
@endsection
