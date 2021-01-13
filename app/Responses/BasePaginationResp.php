<?php
/**
 * 分页响应数据基类
 * User: Woozee
 * Date: 2020/10/29
 * Time: 20:23
 */

namespace App\Responses;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

abstract class BasePaginationResp extends BaseListResp
{
    /** @var int 每页条数 */
    public int $page_size;

    /** @var int 页码 */
    public int $page;

    /** @var int 总数 */
    public int $total;

    public function __construct($data = null)
    {
        if (isset($data)) {
            if ($data instanceof LengthAwarePaginator) {
                $this->page_size = $data->perPage();
                $this->page = $data->currentPage();
                $this->total = $data->total();
            }else {
                parent::__construct($data);
            }
        }
    }
}
