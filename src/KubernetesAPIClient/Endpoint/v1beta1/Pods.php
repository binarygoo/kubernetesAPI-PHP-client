<?php
/**
 * PHP CLient for Kubernetes API 
 *
 * Copyright 2014 binarygoo Inc. All rights reserved.
 *
 * @author Faruk brbovic <fbrbovic@devstub.com>
 * @link http://www.devstub.com/
 * @copyright 2014 binarygoo / devstub.com
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *    http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 */

namespace DevStub\KubernetesAPIClient\Endpoint\v1beta1;

use DevStub\KubernetesAPIClient\Endpoint\BaseEndpoint;
use DevStub\KubernetesAPIClient\Entity\v1beta1\Pod;

class Pods extends BaseEndpoint {

    /**
     * creates a new pod
     *
     * If $pod is left as null then a new Pod object will be returned allowing you to set the properties via method chaining.
     *
     * @param \DevStub\KubernetesAPIClient\Adapter\AdapterResponse $responseAdapter
     * @param Pod|null|string $pod
     *
     * @return Pod|bool|null
     */
    public function create( $pod = null, &$responseAdapter = null) {


        return $this->_prepareCreate("pods",
                                     $pod,
                                     "\\DevStub\\KubernetesAPIClient\\Entity\\v1beta1\\Pod",
                                     array($this, __METHOD__),
                                     $responseAdapter);
    }

    /**
     * Retrieve a list of pods or a specific pod
     *
     * @param null|string $podId
     * @param \DevStub\KubernetesAPIClient\Adapter\AdapterResponse $responseAdapter
     *
     * @return \DevStub\KubernetesAPIClient\Adapter\AdapterResponse
     */
    public function get( $podId = null, &$responseAdapter = null) {

        $path = "pods";

        if ($podId !== null) {
            $path .= "/".$podId;
        }

        $responseAdapter = $this->_adapter->sendGETRequest($path);

        return $responseAdapter;
    }

    /**
     * @param string $podId
     * @param \DevStub\KubernetesAPIClient\Adapter\AdapterResponse $responseAdapter
     *
     * @return \DevStub\KubernetesAPIClient\Adapter\AdapterResponse
     */
    public function delete($podId, &$responseAdapter = null) {

        $path = "pods/".$podId;

        $responseAdapter = $this->_adapter->sendDELETERequest($path);

        return $responseAdapter;
    }

    /**
     * Update a pod.
     *
     * If $pod is left null then you will be able to setup a new fresh pod object via method chaining.
     *
     *
     * @param                                                      $podId
     * @param \DevStub\KubernetesAPIClient\Entity\v1beta1\Pod      $pod
     * @param \DevStub\KubernetesAPIClient\Adapter\AdapterResponse $responseAdapter
     *
     * @return Pod|bool|null
     */
    public function update($podId, $pod = null, &$responseAdapter = null) {


        return $this->_prepareUpdate("pods",
                                     $podId,
                                     $pod,
                                     "\\DevStub\\KubernetesAPIClient\\Entity\\v1beta1\\Pod",
                                     array($this, __METHOD__),
                                     $responseAdapter);
    }

} 