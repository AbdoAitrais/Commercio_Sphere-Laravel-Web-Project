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
    <div class="invoice-header">
      <h1 class="text-3xl font-bold text-white">Demande d'achat</h1>
      
    </div>
    <div class="invoice-body">
      <div class="flex w-full">
          <div class="mb-6">
            <h2 class="text-2xl font-bold">Details</h2>
            <p class="text-gray-600">Date: {{$demandeachat->date}}</p>
            <p class="text-gray-600">Numero: {{$demandeachat->numero}}</p>

          </div>
      </div>
      <div class="mb-6">
        <h2 class="text-2xl font-bold">Articles</h2>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-solid border-b-4">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Titre
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Quantité
                </th>
            </tr>
        </thead>
        <tbody>
            

            @foreach ($demandeachat->virtuelLigneAchats as $virtuelLigneAchat)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                  {{$virtuelLigneAchat->article->titre}}
                </th>
                <td class="px-6 py-4 text-center">
                  {{$virtuelLigneAchat->article->description}}
                </td>
                <td class="px-6 py-4 text-center">
                  {{$virtuelLigneAchat->quantite}}
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
      </div>
      {{$demandeachat->remarque ?? ''}}
    </div>

    

    <div class="invoice-total">
      <h2 class="text-2xl font-bold text-white"></h2>
      
    </div>
  </div>
</body>

</html>
