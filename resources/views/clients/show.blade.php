<x-layout>
    <div class="flex justify-between p-2 mr-5   ">
        <a href="/clients" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
        </a>
        <a href="/clients/{{$client->id}}/edit" class="text-red-500">
            <i class="fa-solid fa-pencil"></i> Edit
          </a>
    </div>
    <div class="mx-4">
      <x-card class="p-10">
        <div class="flex flex-col items-center justify-center text-center">
  
          <h3 class="text-2xl mb-2">
            {{$client->nom}}
          </h3>
          
          <div class="text-xl font-bold mb-4">{{$client->ville .  "-" . $client->pays}}</div>
            <div class="text-lg my-4">
                <i class="fa-solid fa-envelope"></i> {{$client->email}}
            </div>
  
          <div class="text-lg my-4">
            <i class="fa-solid fa-location-dot"></i> {{$client->adresse}}
          </div>
          <div class="text-lg my-4">
            <i class="fa-solid fa-phone"></i> {{$client->telephone}}
        </div>
          <div class="border border-gray-200 w-full mb-6"></div>
            <div class="text-lg my-4">
                <span class="font-bold">ICE :</span> {{$client->ICE}}
            </div>
            <div class="text-lg my-4">
                <span class="font-bold">IF :</span> {{$client->IF}}
            </div>
            <div class="text-lg my-4">
                <span class="font-bold">POSTAL CODE :</span> {{$client->code_postal}}
            </div>
        </div>
      </x-card>
  
      
    </div>
</x-layout>