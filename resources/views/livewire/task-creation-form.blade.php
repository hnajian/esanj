<form class="md:px-5" wire:submit='create'>

    <div class="flex md:px-5">
        <input
            wire:model="title"
            id="Title"
            placeholder="عنوان"
            class="w-1/2 mt-1 md:mx-5 px-5 rounded-md border-gray-200 shadow-sm sm:text-sm"
        />
        @error('name')
            <span class="text-red-500 text-sm mt-3 block"> خطا </span>
        @enderror
      
        <div class="md:w-1/2 md:px-5 ">

        </div>
    </div>
    
    <div class="flex mt-5 md:px-5 ">

        <textarea
            id="Description"
            wire:model="description"
            class="w-1/2 mt-1 md:mx-5 md:px-5 rounded-lg border-gray-200 align-top shadow-sm sm:text-sm"
            rows="6"
            placeholder="توضیحات"
        ></textarea>


        <div class="w-1/2 px-2 md:px-5">
            <label for="HeadlineAct" class="block text-sm font-medium text-gray-900"> اولویت </label>
        
            <select
                name="HeadlineAct"
                wire:model="priority"
                id="HeadlineAct"
                class="mt-1.5 md:w-1/2 rounded-lg border-gray-300 text-gray-700 sm:text-sm"
            >
                <option value="high">بالا</option>
                <option value="medium">متوسط</option>
                <option value="low" selected="selected">پایین</option>

            </select>

            <label for="HeadlineAct" class="block mt-5 text-sm font-medium text-gray-900"> وضعیت </label>
        
            <select
                name="HeadlineAct"
                wire:model="status_id"
                id="HeadlineAct"
                class="mt-1.5 md:w-1/2 rounded-lg border-gray-300 text-gray-700 sm:text-sm"
            >
                <option value=3>کامل شده</option>
                <option value=2>در حال انجام</option>
                <option value=4>به تعویق افتاده</option>
                <option value=1 selected="selected">آغاز نشده</option>

            </select>
        </div>
    </div>
    


    <button
        type="submit"
        class="inline-block rounded border border-indigo-600 bg-indigo-600 max-w-[120px] justify-center mt-5 md:mx-10 px-3 py-3 text-sm font-large text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500"
        href="#"
        >
        <b>افزودن وظیفه</b>
    </button>

</form>