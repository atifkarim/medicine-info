<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Diseases;
use App\Models\Generic;
use App\Models\Product;
use App\Models\SubDiseases;
use Illuminate\Http\Request;

class GlobalSearchController extends Controller {

    private function searchMedicine($term, $request)
    {
        $limit = data_get($request, 'limit', 10);

        $query = Product::query();

        if(!empty($term)) {
            $query->where('name', 'LIKE', '%' . $term . '%');
        }

        $query->orderBy('name');
        return $query->take($limit)->get();
    }

    private function searchSubDiseases($term, $request)
    {
        $limit = data_get($request, 'limit', 10);

        $query = SubDiseases::query();

        if(!empty($term)) {
            $query->where('name', 'LIKE', '%' . $term . '%');
        }

        $query->orderBy('name');
        return $query->take($limit)->get();
    }

    private function searchDiseases($term, $request)
    {
        $limit = data_get($request, 'limit', 10);

        $query = Diseases::query();

        if(!empty($term)) {
            $query->where('name', 'LIKE', '%' . $term . '%');
        }

        $query->orderBy('name');
        return $query->take($limit)->get();
    }

    private function searchBrand($term, $request)
    {
        $limit = data_get($request, 'limit', 10);

        $query = Brand::query();

        if(!empty($term)) {
            $query->where('name', 'LIKE', '%' . $term . '%');
        }

        $query->orderBy('name');
        return $query->take($limit)->get();
    }

    private function searchGeneric($term, $request)
    {
        $limit = data_get($request, 'limit', 10);

        $query = Generic::query();

        if(!empty($term)) {
            $query->where('name', 'LIKE', '%' . $term . '%');
        }

        $query->orderBy('name');
        return $query->take($limit)->get();
    }

    private function transformForSelect2($result, $idAttr, $displayAttr, $customData)
    {
        return $result->map(function($model) use($idAttr, $displayAttr, $customData) {
            $custom = [
                'id' => $model->{$idAttr},
                'text' => $model->{$displayAttr},
            ];
            if(is_array($customData) && count($custom)) {
                foreach ($customData as $data) {
                    $custom[$data] = $model->$data;
                }
            } elseif (!is_array($customData) && is_string($customData)) {
                $custom[$customData] = $model->$customData;
            }

            return $custom;
        });
    }

    private function transformForGlobalSearch($result, $idAttr, $displayAttr, $customData)
    {
        return $result->map(function($model) use($idAttr, $displayAttr, $customData) {
            $custom = [
                'id' => $model->{$idAttr},
                'text' => $model->{$displayAttr},
            ];
            if(is_array($customData) && count($custom)) {
                foreach ($customData as $data) {
                    $custom[$data] = $model->$data;
                }
            } elseif (!is_array($customData) && is_string($customData)) {
                $custom[$customData] = $model->$customData;
            }

            return $custom;
        });
    }

    public function searchEntities(Request $request)
    {
        $term = array_get($request, 'q');
        $widgetType = array_get($request, 'widget_type', 'select2');
        $entity = array_get($request, 'entity');
        $transformer = "transform" . studly_case("for_{$widgetType}");
        $idAttr = 'id';
        $displayAttr = array_get($request, 'display') ?? 'name';

        $result = [];
        $customData = array_get($request, 'customData');

        switch ($entity) {
            case 'brand':
                $result = $this->searchBrand($term, $request);
                break;

            case 'generic':
                $result = $this->searchGeneric($term, $request);
                break;

            case 'diseases':
                $result = $this->searchDiseases($term, $request);
                break;

            case 'sub_diseases':
                $result = $this->searchSubDiseases($term, $request);
                break;

            case 'medicine':
                $result = $this->searchMedicine($term, $request);
                $displayAttr = 'medicine_name';
                break;

            default:
                throw new \Exception(sprintf('Unknown entity %s', $entity));
                break;
        }

        if (empty($result)) {
            return $result;
        }

        return $this->$transformer($result, $idAttr, $displayAttr, $customData);
    }
}