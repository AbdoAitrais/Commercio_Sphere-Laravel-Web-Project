<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
  <title>Professional Invoice</title>
  <style>
    /* Additional styles specific to the invoice */
    .invoice-header {
      background-color: #2B6CB0;
      padding: 2rem;
    }

    .invoice-body {
      padding: 2rem;
    }

    .invoice-total {
      background-color: #2B6CB0;
      padding: 2rem;
    }

    .invoice-item {
      background-color: #E2E8F0;
    }

    .invoice-item th {
      background-color: #CBD5E0;
    }
  </style>
</head>

<body>
  <div class="max-w-2xl mx-auto">
    {{-- <div class="invoice-header">
      <h1 class="text-3xl font-bold text-white">Demande d'achat</h1>
      
    </div> --}}
    <div class="invoice-body">
      <table class="w-full mb-6 mt-32">
          <tbody class="">
            <tr>
                <td>
                    <h3 class=" text-sm font-bold"></h3>
                </td>
                <td>
                    <h3 class="text-sm font-bold text-right">Clients</h3>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="text-gray-600 text-xs"></p>
                </td>
                <td>
                    <p class="text-gray-600 text-xs text-right">Nom: {{$devis->client->person->nom. " " . $devis->client->person->prenom}}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="text-gray-600 text-xs"></p>
                </td>
                <td>
                    <p class="text-gray-600 text-xs text-right">Adresse: {{$devis->client->person->addresses[0]->adresse}}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <h3 class=" text-sm font-bold">Details</h3>
                </td>
                <td>
                    <p class="text-gray-600 text-xs text-right"></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="text-gray-600 text-xs">Date: {{$devis->date}}</p>
                </td>
                <td>
                    <p class="text-gray-600 text-xs text-right"></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="text-gray-600 text-xs">Nº Devis: {{$devis->numero}}</p>
                </td>
                <td>
                    <p class="text-gray-600 text-xs text-right"></p>
                </td>
            </tr>
          </tbody>
      </table>
      <div class="mb-6">
        
        <div class="relative overflow-x-auto shadow-md mt-4">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-solid border-b-4">
                    <tr>
                        <th scope="col" class="px-2 py-3">
                            Titre
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Quantité
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Prix HT
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Total HT
                        </th>
                        <th scope="col" class="px-2 py-3">
                            TVA
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total_ht = 0;
                        $total_tva = 0;
                    @endphp

                    @foreach ($devis->ligneDevis as $ligneDevis)
                    <tr class="bg-white border-b text-xs">
                        <th scope="row" class="px-2 font-medium text-gray-900 whitespace-nowrap text-center">
                        {{$ligneDevis->article->titre}}
                        </th>
                        <td class="px-2 py-3 text-center">
                        {{$ligneDevis->article->description}}
                        </td>
                        <td class="px-2 py-3 text-center">
                            {{$ligneDevis->quantite}}
                        </td>
                        <td class="px-2 py-3 text-center">
                            {{$ligneDevis->article->prix_vente}}
                        </td>
                        <td class="px-2 py-3 text-center">
                            {{$ligneDevis->article->prix_vente * $ligneDevis->quantite}}
                        </td>
                        <td class="px-2 py-3 text-center">
                            {{$ligneDevis->tva*100 . "%"}}
                        </td>
                        
                    </tr>
                    @php
                        $total_ht += $ligneDevis->article->prix_vente * $ligneDevis->quantite;
                        $total_tva += $ligneDevis->article->prix_vente * $ligneDevis->quantite * $ligneDevis->tva;
                    @endphp
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        {{-- <table class="text-xs">
            <tr>
                <td class=" font-bold">
                    Total HT
                </td>
                <td>
                    {{$total_ht}}
                </td>
            </tr>
            <tr>
                <td class=" font-bold">
                    Total TVA
                </td>
                <td>
                    {{$total_tva}}
                </td>
            </tr>
            <tr>
                <td class=" font-bold">
                    Total TTC
                </td>
                <td>
                    {{$total_ht + $total_tva}}
                </td>
            </tr>
        </table> --}}
        <table class="w-48 text-sm text-left text-gray-500">
            <tbody>

                
                <tr class="bg-white text-xs">
                    <th scope="row" class="px-2 font-bold text-gray-900 whitespace-nowrap text-center">
                        Total HT
                    </th>
                    <td class="px-2 py-3 text-center">
                        {{$total_ht}}
                    </td>
                </tr>
                <tr class="bg-white text-xs border-solid border-b-2">
                    <th scope="row" class="px-2 font-bold text-gray-900 whitespace-nowrap text-center">
                        Total TVA
                    </th>
                    <td class="px-2 py-3 text-center">
                        {{$total_tva}}
                    </td>
                </tr>
                <tr class="bg-white text-xs">
                    <th scope="row" class="px-2 font-bold text-gray-900 whitespace-nowrap text-center">
                        Total TTC
                    </th>
                    <td class="px-2 py-3 text-center">
                        {{$total_ht + $total_tva}}
                    </td>
                </tr>
                
            </tbody>
        </table>
      </div>
      {{$devis->remarque ?? ''}}
      
    </div>
    <div id="total_words"></div>

    

    <div class="invoice-total absolute bottom-0 w-full ">
      <h2 class="text-2xl font-bold text-white"></h2>
      
    </div>
  </div>
</body>

</html>