@if($user->profile_photo_url)
<img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="flex-shrink-0 w-10 h-10 rounded-full">
@else
<div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">
    {{ strtoupper(substr($user->name, 0, 1)) }}
</div>
@endif