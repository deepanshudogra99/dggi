<div>
    <!-- <div>
        <h2 class="text-lg font-semibold text-gray-800 justify-center">State Master</h2>
        <button wire:click="toggle('newmodal')" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">+ Add State</button>
    </div> -->
    <div class="flex justify-center items-center">
    <h2 class="text-lg font-semibold text-gray-800">State Master</h2>
    <button wire:click="toggle('newmodal')" class="ml-auto px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">+ Add State</button>
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
                        <div class="mb-4">
                            <x-label for="stateabr" name="stateabr" class="block text-sm font-medium text-gray-700"/><b>State Abbrevation</b>
                            <x-input wire:model="stateabr" name="stateabr" type="text" required class="mt-2 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter state abbrevation    " />
                        </div>    
                    </form>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="flex justify-end">
                <button wire:click="$toggle('newmodal')"  class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Cancel</button>
                <button wire:click="newstate()"  class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 ml-2" >Submit</button>
            </div>
        </x-slot>
    </x-confirmation-modal>
</div>

