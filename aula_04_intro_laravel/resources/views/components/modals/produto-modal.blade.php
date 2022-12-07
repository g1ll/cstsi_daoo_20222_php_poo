<div {{ $attributes }} x-show="{{ $attributes['trigger'] }} == $el.id"
    :class="{{ $trigger }} == $el.id ?
        $el.className =
        'overflow-y-auto overflow-x-auto fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-full md:h-full' :
        'hidden'">
    <div class="flex flex-col w-full h-full pt-20 bg-gray-600/50" @click="idmodal=null">
        <div class="flex flex-col justify-center w-1/2 shadow dark:bg-gray-700 h-auto m-1 p-3 bg-white self-center rounded-md">
            <div class="p-2 mb-2 border-b-2 border-gray-300 ">
                <h1 class="text-2xl">{{$title}}</h1>
            </div>
        {{ $slot }}
        </div>
    </div>
</div>
