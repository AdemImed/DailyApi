<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeetingTokenRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if ($this->routeIs('generateSelfSignedToken'))
        {
            return [
                'room_name' => 'required|string',
                'user_name' => 'required|string',
                'is_owner' => 'nullable|boolean',
            ];
        }
        return [
            'properties.room_name' => 'required|string',
            'properties.exp' => 'nullable|integer',
            'properties.nbf' => 'nullable|integer',
            'properties.eject_after_elapsed' => 'nullable|integer',
            'properties.eject_at_token_exp' => 'nullable|boolean',
            'properties.is_owner' => 'nullable|boolean',
            'properties.user_name' => 'nullable|string',
            'properties.user_id' => 'nullable|string|max:36',
            'properties.enable_screenshare' => 'nullable|boolean',
            'properties.start_video_off' => 'nullable|boolean',
            'properties.start_audio_off' => 'nullable|boolean',
            'properties.enable_recording' => 'nullable|string|in:cloud,local,rtp-tracks,output-byte-stream',
            'properties.enable_prejoin_ui' => 'nullable|boolean',
            'properties.enable_recording_ui' => 'nullable|boolean',
            'properties.enable_terse_logging' => 'nullable|boolean',
            'properties.start_cloud_recording' => 'nullable|boolean',
            'properties.close_tab_on_exit' => 'nullable|boolean',
            'properties.redirect_on_meeting_exit' => 'nullable|string',
            'properties.lang' => 'nullable|string|in:de,en,es,fi,fr,it,jp,ka,nl,no,pt,pl,ru,sv,tr,user',
        ];
    }
}
