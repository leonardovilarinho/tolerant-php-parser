<?php
/*---------------------------------------------------------------------------------------------
 * Copyright (c) Microsoft Corporation. All rights reserved.
 *  Licensed under the MIT License. See License.txt in the project root for license information.
 *--------------------------------------------------------------------------------------------*/

namespace Microsoft\PhpParser\Node;

use Microsoft\PhpParser\Node;
use Microsoft\PhpParser\Token;

class Parameter extends Node {
    /** @var QualifiedName | Token | null */
    public $typeDeclaration;
    /** @var Token | null */
    public $byRefToken;
    /** @var Token | null */
    public $dotDotDotToken;

    /** @var Token */
    public $variableName;

    /** @var Token | null */
    public $equalsToken;

    /** @var null | Expression */
    public $default;

    const CHILD_NAMES = [
        'typeDeclaration',
        'byRefToken',
        'dotDotDotToken',
        'variableName',
        'equalsToken',
        'default'
    ];

    public function isVariadic() {
        return $this->byRefToken !== null;
    }

    public function getName() {
        if ($this->variableName instanceof Token) {
            return substr($this->variableName->getText($this->getFileContents()), 1);
        }
        return null;
    }
}
