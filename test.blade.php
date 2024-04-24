<div>

       
                <div class="bg-white rounded-lg shadow-md overflow-hidden"> 
                    <div class="px-6 py-4 bg-gray-200 flex justify-between items-center">
                    <h2 class="text-lg font-semibold text-gray-800">State Master</h2>
                    <button wire:click="toggleModal" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">+ Add State</button>
                    <x-confirmation-modal>
                        <x-slot name="title">
                            Enter New State
                        </x-slot>
                        <x-slot name="content">
                        @if($isOpen)
                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center">
                            <div class="bg-white p-8 rounded-lg shadow-xl w-96">
                                <button wire:click="toggleModal" class="absolute top-0 right-0 p-2 text-gray-500 hover:text-gray-700 focus:outline-none">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>Close
                                </button>
                                <form name="addstate" class="px-4 py-6">
                                    @csrf
                                    <div class="mb-4">
                                        <x-label for="statename" name="statename" class="block text-sm font-medium text-gray-700"/><b>State Name</b>
                                        <x-input wire:model="statename" name="statename" type="text" required class="mt-2 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter state name" />
                                    </div>     
                                   
                                    
                                </form>
                                @endif
                                </x-slot>
                                <x-slot name="footer">
                                <div class="flex justify-end">
                                        <button wire:click="toggleModal"  class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Cancel</button>
                                        <button wire:submit="newstate()"  class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 ml-2" >Submit</button>


                                    </div>
                                </x-slot>
                               
                            </div>
                        </div>
                    
                    </x-confirmation-modal>
                   
                    </div>
                    <!-- Table -->
                    <div class="mt-2 px-6 py-4">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sr.No.</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">State Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">State Code</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Data 1</td>
                            <td class="px-6 py-4 whitespace-nowrap">Data 2</td>
                            <td class="px-6 py-4 whitespace-nowrap">Data 3</td>
                        </tr>
                        <!-- More rows can be added here -->
                        </tbody>
                    </table>
                </div>
            </div>
       
</div>





<x-confirmation-modal wire:model="newmodal">
<x-slot name="title">
    Add New State
</x-slot>


<x-slot name="content">
    <div>

  
<x-validation-errors class="mb-4" />
<form name="addstate" class="px-4 py-6">
@csrf
<div class="mb-4">
    <x-label for="statename" name="statename" class="block text-sm font-medium text-gray-700"/><b>State Name</b>
    <x-input wire:model="statename" name="statename" type="text" required class="mt-2 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter state name" />
</div>    
</form>
</div>
</x-slot>


<x-slot name="footer">
<div class="flex justify-end">
<button wire:click="toggleModal"  class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Cancel</button>
<button wire:submit="newstate()"  class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 ml-2" >Submit</button>
</div>
</x-slot>








    
</x-confirmation-modal>

