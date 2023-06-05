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
      <h1 class="text-3xl font-bold text-white">Invoice</h1>
      <p class="text-gray-300">123 Main Street, City, Country</p>
    </div>
    <div class="invoice-body">
      <div class="flex w-full">
        <div class="mb-6">
            <h2 class="text-2xl font-bold">Client Information</h2>
            <p class="text-gray-600">Client Name</p>
            <p class="text-gray-600">Client Address</p>
            <p class="text-gray-600">Client Email</p>
          </div>
          <div class="mb-6">
            <h2 class="text-2xl font-bold">Invoice Details</h2>
            <p class="text-gray-600">Invoice Number: INV001</p>
            <p class="text-gray-600">Invoice Date: June 1, 2023</p>
          </div>
      </div>
      <div class="mb-6">
        <h2 class="text-2xl font-bold">Items</h2>
        <table class="w-full border">
          <thead class="bg-blue-200">
            <tr>
              <th class="py-2 px-4 border">Titre</th>
              <th class="py-2 px-4 border">Description</th>
              <th class="py-2 px-4 border">Quantité</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($demandeachat->virtuelLigneAchats as $virtuelLigneAchat)
            <tr class="invoice-item">
              <td class="py-2 px-4 border">{{$virtuelLigneAchat->virtuelarticle->titre}}</td>
              <td class="py-2 px-4 border">{{$virtuelLigneAchat->virtuelarticle->description}}</td>
              <td class="py-2 px-4 border">{{$virtuelLigneAchat->quantite}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="invoice-total">
      <h2 class="text-2xl font-bold text-white">Total Amount: $35</h2>
    </div>
  </div>
</body>

</html>
