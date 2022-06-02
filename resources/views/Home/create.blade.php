<div id="FormModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-auto fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Create Reservation
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="FormModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form id="formR" action="javascript:void(0)" onsubmit="home.store()">
                    <div class="container flex flex-col p-2">
                        <label for="restaurant_id">Restaurant</label>
                        <Select required id="restaurant_id" name="restaurant_id" class="form-control rounded-full" onchange="home.ubication()">
                            <option value="">Select Restaurant</option>
                        </Select>
                    </div>
                    <div class="container flex flex-col p-2">
                        <label for="ubication_zone_id">Ubication</label>
                        <Select required id="ubication_zone_id" name="ubication_zone_id" class="form-control rounded-full" onchange="home.tables()" disabled>
                            <option value="">Select Ubication</option>
                        </Select>
                    </div>
                    <div class="container flex flex-col p-2">
                        <label for="ubication_table_id">Table</label>
                        <Select required id="ubication_table_id" name="ubication_table_id" class="form-control rounded-full" disabled onchange="home.users()">
                            <option value="">Select Table</option>
                        </Select>
                    </div>
                    <div class="container flex flex-col p-2">
                        <label for="user_id">Client</label>
                        <Select required id="user_id" name="user_id" class="form-control rounded-full" disabled onchange="home.dateE()">
                            <option value="">Select Client</option>
                        </Select>
                    </div>
                    <div class="container flex flex-col p-2">
                        <label for="date">Date</label>
                        <input type="date" id="date" name="date" class="form-control rounded-full" onchange="home.date()" required>
                    </div>
                    <div class="container flex flex-col p-2">
                        <label for="hour_id">Hour</label>
                        <Select required id="hour_id" name="hour_id" class="form-control rounded-full" disabled>
                            <option value="">Select Hour</option>
                        </Select>
                    </div>

                    <div class="container flex flex-col p-2">
                        <label for="invoce">Invoce Required</label>
                        <input type="checkbox" id="invoce" name="invoce" value="1" class="form-control rounded-full">
                    </div>

                    <input type="text" style="display:none" value="" id="edit" name="edit">
                    <input type="text" style="display:none" value="" id="editId" name="editId">
            </div>
            <!-- Modal footer -->
            <div class="flex flex-row-reverse gap-2 p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
                <button id="closeM" data-modal-toggle="FormModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
            </div>
        </form>
        </div>
    </div>
</div>
