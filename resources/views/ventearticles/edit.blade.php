<x-layout>
    <section class="section main-section mb-5">
        <a href="{{route('ventearticles.index')}}" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
        </a>
        <form method="POST" action="{{route('ventearticles.update',['ventearticle'=>$ventearticle->id])}}">
            @method('PUT')
            @csrf   
            <x-card>
                <x-card-header>
                    <span class="icon"><i class="fa fa-user-circle"></i></span>
                    Modifier Article d'Achat
                </x-card-header>
                <x-card-content>
                    {{-- <div class="field">
                        <label class="label">Avatar</label>
                        <div class="field-body">
                            <div class="field file">
                            <label class="upload control">
                                <a class="button blue">
                                Upload
                                </a>
                                <input type="file">
                            </label>
                            </div>
                        </div>
                        </div> --}}
                    
                        
                        <div class="relative z-0 w-full mb-6 group">
                            <div class="mb-6">
                                <label for="titre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre <span class="text-red-600">*</span></label>
                                <input type="text" id="titre" name="titre" value="{{$ventearticle->article->titre}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
                                @error('titre')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description <span class="text-red-600">*</span></label>
                                <input type="text" id="description" name="description" value="{{$ventearticle->article->description}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required>
                                @error('description')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Code <span class="text-red-600">*</span></label>
                                <input type="text" id="code" name="code" value="{{$ventearticle->article->code}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="XX XX XXX XXX XXX" required>
                                @error('code')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="prix" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prix <span class="text-red-600">*</span></label>
                                <input type="text" id="prix" name="prix" value="{{$ventearticle->article->prix}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="XXXXXXXXXXXXXXX" required>
                                @error('prix')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <hr>

                </x-card-content>
            </x-card>
            <div class="mt-5 md:w-full lg:w-full flex justify-center">
                <button type="submit" class="md:w-full lg:w-auto hidden md:block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xl w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

            </div>
        </form>
    </section>
    <x-nav-bar/>
    <x-footer/>
    <x-flash-message/>
    <x-aside/>
</x-layout>