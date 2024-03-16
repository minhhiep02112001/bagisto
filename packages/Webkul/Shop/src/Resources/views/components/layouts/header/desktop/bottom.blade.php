{!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.before') !!}

<div
    class="w-full flex justify-between min-h-[78px] px-[60px] border border-t-0 border-b border-l-0 border-r-0 max-1180:px-8 bg-sky-800">
    <!-- Right Nagivation Section -->
    {{-- <div class="flex gap-x-9 items-center max-lg:gap-x-7 max-[1100px]:gap-x-5"> --}}
    <div class="w-full container-full">
        <ul class="flex w-full items-center h-full  justify-end" id="header-desktop">
            <li class="item search w-4/12"> <!-- Search Bar Container -->
                <div class="relative w-full">
                    <form action="{{ route('shop.search.index') }}" class="flex items-center max-w-[445px]" role="search">
                        <label for="organic-search" class="sr-only">
                            @lang('shop::app.components.layouts.header.search')
                        </label>

                        <div
                            class="icon-search flex items-center  absolute ltr:left-3 rtl:right-3 top-2.5 text-xl pointer-events-none">
                        </div>

                        <input type="text" name="query" value="{{ request('query') }}"
                            class="block w-full px-11 py-3 bg-[#F5F5F5] rounded-lg text-gray-900 text-xs font-medium transition-all border border-transparent hover:border-gray-400 focus:border-gray-400"
                            placeholder="@lang('shop::app.components.layouts.header.search-text')" aria-label="@lang('shop::app.components.layouts.header.search-text')" aria-required="true"
                            required>

                        <button type="submit" class="hidden" aria-label="Submit"></button>

                        {{-- @if (core()->getConfigData('general.content.shop.image_search'))
                            @include('shop::search.images.index')
                        @endif --}}
                    </form>
                </div>
            </li>
            <li class="item">
                <a href="">
                    <div class="flex">
                        <img src="{{ bagisto_asset('images/icon/account.svg') }}" alt="">
                        <span>Tài khoản</span>
                    </div>
                </a>
            </li>
            <li class="item">
                <a href="">
                    <div class="flex">
                        <img src="{{ bagisto_asset('images/icon/report.svg') }}" alt="">
                        <span>Báo cáo</span>
                    </div>
                </a>
            </li>
            <li class="item">
                <a href="">
                    <div class="flex">
                        <img src="{{ bagisto_asset('images/icon/love.svg') }}" alt="">
                        <span>Yêu thích</span>
                    </div>
                </a>
            </li>
            <li class="item">
                <a href="">
                    <div class="flex">
                        <img src="{{ bagisto_asset('images/icon/cart.svg') }}" alt="">
                        <span>Giỏ hàng</span>
                    </div>
                </a>
            </li>
        </ul>
    </div>

</div>
<div class="w-full before-header p-2">
    <div class="w-full container-full">
        <ul class="flex w-full items-center h-full  justify-start" >
            <li class="item uppercase "> <!-- Search Bar Container -->
                <div class="flex">
                    <img src="{{ bagisto_asset('images/icon/group.svg') }}" alt="">
                    <span class="ml-1">Phòng tắm</span>
                </div>
            </li>
            <li class="item uppercase ">
                <a href="">
                    <span>Bồn cầu</span>
                </a>
            </li>
            <li class="item uppercase ">
                <a href="">
                    <span>Vòi rửa</span>
                </a>
            </li>
            <li class="item uppercase ">
                <a href="">
                    <span>Chậu rửa</span>
                </a>
            </li>
            <li class="item uppercase ">
                <a href="">
                    <span>Sen tắm</span>
                </a>
            </li>
            <li class="item uppercase ">
                <a href="">
                    <span>Bồn tắm</span>
                </a>
            </li>
            <li class="item uppercase ">
                <a href="">
                    <span>Xịt bồn cầu</span>
                </a>
            </li>
            <li class="item uppercase ">
                <a href="">
                    <span>Phụ kiện</span>
                </a>
            </li>
           
        </ul>
    </div>
</div>

@pushOnce('scripts')
    <script type="text/x-template" id="v-desktop-category-template">
        <div
            class="flex gap-5 items-center"
            v-if="isLoading"
        >
            <span
                class="shimmer w-20 h-6 rounded"
                role="presentation"
            ></span>
            <span
                class="shimmer w-20 h-6 rounded"
                role="presentation"
            ></span>
            <span
                class="shimmer w-20 h-6 rounded"
                role="presentation"
            ></span>
        </div>

        <div
            class="flex items-center"
            v-else
        >
            <div
                class="flex items-center relative h-[77px] group border-b-[4px] border-transparent hover:border-b-[4px] hover:border-navyBlue"
                v-for="category in categories"
            >
                <span>
                    <a
                        :href="category.url"
                        class="inline-block px-5 uppercase"
                        v-text="category.name"
                    >
                    </a>
                </span>

                <div
                    class="w-max absolute top-[78px] max-h-[580px] max-w-[1260px] p-9 z-[1] overflow-auto overflow-x-auto bg-white shadow-[0_6px_6px_1px_rgba(0,0,0,.3)] border border-b-0 border-l-0 border-r-0 border-t border-[#F3F3F3] pointer-events-none opacity-0 transition duration-300 ease-out translate-y-1 group-hover:pointer-events-auto group-hover:opacity-100 group-hover:translate-y-0 group-hover:ease-in group-hover:duration-200 ltr:-left-9 rtl:-right-9"
                    v-if="category.children.length"
                >
                    <div class="flex aigns gap-x-[70px] justify-between">
                        <div
                            class="grid grid-cols-[1fr] gap-5 content-start w-full flex-auto min-w-max max-w-[150px]"
                            v-for="pairCategoryChildren in pairCategoryChildren(category)"
                        >
                            <template v-for="secondLevelCategory in pairCategoryChildren">
                                <p class="text-navyBlue font-medium">
                                    <a
                                        :href="secondLevelCategory.url"
                                        v-text="secondLevelCategory.name"
                                    >
                                    </a>
                                </p>

                                <ul
                                    class="grid grid-cols-[1fr] gap-3"
                                    v-if="secondLevelCategory.children.length"
                                >
                                    <li
                                        class="text-sm font-medium text-[#6E6E6E]"
                                        v-for="thirdLevelCategory in secondLevelCategory.children"
                                    >
                                        <a
                                            :href="thirdLevelCategory.url"
                                            v-text="thirdLevelCategory.name"
                                        >
                                        </a>
                                    </li>
                                </ul>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-desktop-category', {
            template: '#v-desktop-category-template',

            data() {
                return {
                    isLoading: true,

                    categories: [],
                }
            },

            mounted() {
                this.get();
            },

            methods: {
                get() {
                    this.$axios.get("{{ route('shop.api.categories.tree') }}")
                        .then(response => {
                            this.isLoading = false;

                            this.categories = response.data.data;
                        }).catch(error => {
                            console.log(error);
                        });
                },

                pairCategoryChildren(category) {
                    return category.children.reduce((result, value, index, array) => {
                        if (index % 2 === 0) {
                            result.push(array.slice(index, index + 2));
                        }

                        return result;
                    }, []);
                }
            },
        });
    </script>
@endPushOnce

{!! view_render_event('bagisto.shop.components.layouts.header.desktop.bottom.after') !!}
