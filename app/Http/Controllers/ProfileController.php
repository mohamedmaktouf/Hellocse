<?php

namespace App\Http\Controllers;

use App\DTOs\ProfileDTO;
use App\Http\Requests\CreateProfileRequest;
use App\Http\Resources\ProfileResource;
use App\Services\ProfileService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\UploadedFile;

class ProfileController extends Controller
{
    private ProfileService $profileService;
    public function __construct(ProfileService $profileService){
        $this->profileService = $profileService;
    }

    /**
     * @param CreateProfileRequest $request
     * @return ProfileResource
     */
    public function store(CreateProfileRequest $request) : ProfileResource
    {
        $profileDTO = new ProfileDTO($request->string('first_name') , $request->string('last_name') ,
            $request->file('image') , $request->integer('status'));
        $profile = $this->profileService->store($profileDTO);
        return new ProfileResource($profile);
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function list() : AnonymousResourceCollection
    {
        $profiles = $this->profileService->list();
        return ProfileResource::collection($profiles);
    }
    public function update(CreateProfileRequest $request , $id) : ProfileResource
    {
        $profileDTO = new ProfileDTO($request->string('first_name') , $request->string('last_name') ,
            $request->file('image') , $request->integer('status'));
        $profile = $this->profileService->update($profileDTO , $id);
        return new ProfileResource($profile);
    }
}
