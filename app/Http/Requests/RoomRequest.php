<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
        $rules = [
            'name' => 'nullable|string',
            'privacy' => 'nullable|string|in:public,private',
        ];

        if (!empty($this->get('properties')))
        {
            $rules = array_merge($rules,[
                'properties.nbf' => 'nullable|integer',
                'properties.exp' => 'nullable|integer',
                'properties.max_participants' => 'nullable|integer',
                'properties.enable_people_ui' => 'nullable|boolean',
                'properties.enable_pip_ui' => 'nullable|boolean',
                'properties.enable_prejoin_ui' => 'nullable|boolean',
                'properties.enable_network_ui' => 'nullable|boolean',
                'properties.enable_knocking' => 'nullable|boolean',
                'properties.enable_screenshare' => 'nullable|boolean',
                'properties.enable_video_processing_ui' => 'nullable|boolean',
                'properties.enable_chat' => 'nullable|boolean',
                'properties.start_video_off' => 'nullable|boolean',
                'properties.start_audio_off' => 'nullable|boolean',
                'properties.owner_only_broadcast' => 'nullable|boolean',
                'properties.enable_recording' => 'nullable|string|in:cloud,local,rtp-tracks,output-byte-stream',
                'properties.enable_advanced_chat' => 'nullable|boolean',
                'properties.enable_hidden_participants' => 'nullable|boolean',
                'properties.enable_mesh_sfu' => 'nullable|boolean',
                'properties.experimental_optimize_large_calls' => 'nullable|boolean',
                'properties.lang' => 'nullable|string|in:de,en,es,fi,fr,it,jp,ka,nl,no,pt,pl,ru,sv,tr,user',
                'properties.meeting_join_hook' => 'nullable|string',
                'properties.signaling_imp' => 'nullable|string|in:ws',
                'properties.geo' => 'nullable|string|in:af-south-1,ap-northeast-2,ap-southeast-1,ap-southeast-2,ap-south-1,eu-central-1,eu-west-2,sa-east-1,us-east-1,us-west-2',
                'properties.rtmp_geo' => 'nullable|string|in:af-south-1,ap-northeast-2,ap-southeast-1,ap-southeast-2,ap-south-1,eu-central-1,eu-west-2,sa-east-1,us-east-1,us-west-2',
                'properties.enable_terse_logging' => 'nullable|boolean',
            ]);

            if (!empty($this->get('properties.recordings_bucket')))
            {
                $rules = array_merge($rules,[
                    'properties.recordings_bucket.bucket_name' => 'nullable|string',
                    'properties.recordings_bucket.bucket_region' => 'nullable|string',
                    'properties.recordings_bucket.assume_role_arn' => 'nullable|string',
                    'properties.recordings_bucket.allow_api_access' => 'nullable|boolean',
                ]);
            }
        }
        return $rules;
    }
}
