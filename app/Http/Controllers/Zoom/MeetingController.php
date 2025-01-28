<?php

namespace App\Http\Controllers\Zoom;
use App\Http\Controllers\Controller;
use App\Models\zoomdata;
use Illuminate\Http\Request;
use App\Traits\ZoomJWT;
use Illuminate\Support\Facades\Validator;

class MeetingController extends Controller
{
    use ZoomJWT;

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;


     public function list(Request $request)
 {
    $data = zoomdata::all();

    return view('admin.listofmeetings',compact('data'));
 }

public function list_api(Request $request)
{
    $path = 'users/me/meetings';
    $response = $this->zoomGet($path);

    $data = json_decode($response->body(), true);
    $data['meetings'] = array_map(function (&$m) {
        $m['start_at'] = $this->toUnixTimeStamp($m['start_time'], $m['timezone']);
        return $m;
    }, $data['meetings']);

    return [
        'success' => $response->ok(),
        'data' => $data,
    ];
}
public function create(Request $request)
{
    $validator = Validator::make($request->all(), [
        'topic' => 'required|string',
        'start_time' => 'required|date',
        'agenda' => 'string|nullable',
    ]);

    if ($validator->fails()) {
        return [
            'success' => false,
            'data' => $validator->errors(),
        ];
    }
    $data = $validator->validated();

    $path = 'users/me/meetings';
    $response = $this->zoomPost($path, [
        'topic' => $request->topic,
        'type' => self::MEETING_TYPE_SCHEDULE,
        'start_time' => $this->toZoomTimeFormat($request->start_time),
        'duration' => 30,
        'agenda' => $request->agenda,
        'settings' => [
            'host_video' => false,
            'participant_video' => false,
            'waiting_room' => true,
        ]
    ]);


    // return [
    //     'success' => $response->status() === 201,
    //     'data' => json_decode($response->body(), true),
    // ];
    $databody = json_decode($response->body(), true);

    $zoomdata = new zoomdata();
    // dd($zoomdata);
    $zoomdata->topic = $databody['topic'];
    $zoomdata->agenda = $databody['agenda'];
    $zoomdata->start_time = $databody['start_time'];
    $zoomdata->start_url = $databody['start_url'];
    $zoomdata->join_url = $databody['join_url'];
    $zoomdata->save();

    return redirect('/list');
}


// public function create(Request $request)
// {
//     $validator = Validator::make($request->all(), [
//         'topic' => 'required|string',
//         'start_time' => 'required|date',
//         'agenda' => 'string|nullable',
//     ]);

//     if ($validator->fails()) {
//         return [
//             'success' => false,
//             'data' => $validator->errors(),
//         ];
//     }
//     $data = $validator->validated();

//     $path = 'users/me/meetings';
//     $response = $this->zoomPost($path, [
//         'topic' => $request->topic,
//         'type' => self::MEETING_TYPE_SCHEDULE,
//         'start_time' => $this->toZoomTimeFormat($request->start_time),
//         'duration' => 30,
//         'agenda' => $request->agenda,
//         'settings' => [
//             'host_video' => false,
//             'participant_video' => false,
//             'waiting_room' => true,
//         ]
//     ]);

//     // Check if the Zoom API request was successful
//     if ($response->status() !== 201) {
//         // Handle error, maybe log or return a response
//         return [
//             'success' => false,
//             'error' => 'Failed to create Zoom meeting',
//             'zoom_response' => json_decode($response->body(), true),
//         ];
//     }

//     $databody = json_decode($response->body(), true);

//     // Verify the presence of required keys in the response
//     if (!isset($databody['topic'], $databody['agenda'], $databody['start_time'], $databody['start_url'], $databody['join_url'])) {
//         // Log unexpected response structure
//         \Log::error('Unexpected Zoom API response', ['response' => $databody]);
//         return [
//             'success' => false,
//             'error' => 'Unexpected response from Zoom API',
//             'zoom_response' => $databody,
//         ];
//     }

//     $zoomdata = new zoomdata();
//     $zoomdata->topic = $databody['topic'];
//     $zoomdata->agenda = $databody['agenda'];
//     $zoomdata->start_time = $databody['start_time'];
//     $zoomdata->start_url = $databody['start_url'];
//     $zoomdata->join_url = $databody['join_url'];
//     $zoomdata->save();

//     return redirect('/list');
// }

public function create_api(Request $request)
{
    $validator = Validator::make($request->all(), [
        'topic' => 'required|string',
        'start_time' => 'required|date',
        'agenda' => 'string|nullable',
    ]);

    if ($validator->fails()) {
        return [
            'success' => false,
            'data' => $validator->errors(),
        ];
    }
    $data = $validator->validated();

    $path = 'users/me/meetings';
    $response = $this->zoomPost($path, [
        'topic' => $data['topic'],
        'type' => self::MEETING_TYPE_SCHEDULE,
        'start_time' => $this->toZoomTimeFormat($data['start_time']),
        'duration' => 30,
        'agenda' => $data['agenda'],
        'settings' => [
            'host_video' => false,
            'participant_video' => false,
            'waiting_room' => true,
        ]
    ]);


    return [
        'success' => $response->status() === 201,
        'data' => json_decode($response->body(), true),
    ];
}
public function update(Request $request, string $id)
{
    $validator = Validator::make($request->all(), [
        'topic' => 'required|string',
        'start_time' => 'required|date',
        'agenda' => 'string|nullable',
    ]);

    if ($validator->fails()) {
        return [
            'success' => false,
            'data' => $validator->errors(),
        ];
    }
    $data = $validator->validated();

    $path = 'meetings/' . $id;
    $response = $this->zoomPatch($path, [
        'topic' => $data['topic'],
        'type' => self::MEETING_TYPE_SCHEDULE,
        'start_time' => (new \DateTime($data['start_time']))->format('Y-m-d\TH:i:s'),
        'duration' => 30,
        'agenda' => $data['agenda'],
        'settings' => [
            'host_video' => false,
            'participant_video' => false,
            'waiting_room' => true,
        ]
    ]);

    return [
        'success' => $response->status() === 204,
        'data' => json_decode($response->body(), true),
    ];
}
public function delete(Request $request, string $id)
{
    $path = 'meetings/' . $id;
    $response = $this->zoomDelete($path);

    return [
        'success' => $response->status() === 204,
        'data' => json_decode($response->body(), true),
    ];
}
public function createmeetings()
{
    return view('admin.createzoommeeting');
}

public function deletemeeting($id)
{
    $data = zoomdata::find($id);
    $data->delete();
    return redirect()->back();
}

}


