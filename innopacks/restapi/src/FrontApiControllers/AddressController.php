<?php
 
namespace InnoShop\RestAPI\FrontApiControllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use InnoShop\Common\Models\Address;
use InnoShop\Common\Repositories\AddressRepo;
use InnoShop\Common\Resources\AddressListItem;
use Throwable;

class AddressController extends BaseController
{
    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $filters = [
            'customer_id' => token_customer_id(),
        ];

        $items     = AddressRepo::getInstance()->builder($filters)->get();
        $addresses = AddressListItem::collection($items)->jsonSerialize();

        return read_json_success($addresses);
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->all();

        $data['customer_id'] = token_customer_id();

        $address = AddressRepo::getInstance()->create($data);
        $result  = new AddressListItem($address);

        return create_json_success($result);
    }

    /**
     * @param  Request  $request
     * @param  Address  $address
     * @return JsonResponse
     */
    public function update(Request $request, Address $address): JsonResponse
    {
        $data = $request->all();

        $data['customer_id'] = token_customer_id();

        $address = AddressRepo::getInstance()->update($address, $data);
        $result  = new AddressListItem($address);

        return update_json_success($result);
    }

    /**
     * @param  Request  $request
     * @param  Address  $address
     * @return JsonResponse
     */
    public function destroy(Request $request, Address $address): JsonResponse
    {
        $customerID = token_customer_id();
        if ($customerID != $address->customer_id) {
            return json_fail('Unauthorized', null, 403);
        }

        $address->delete();

        return delete_json_success('success');
    }
}
