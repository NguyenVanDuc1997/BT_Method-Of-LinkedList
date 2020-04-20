<?php

include_once "Node.php";

class LinkedList
{
    public $firstNode;
    public $lastNode;
    public $count;

    public function __construct()
    {
        $this->firstNode = null;
        $this->lastNode = null;
        $this->count = 0;
    }

    public function insertFirst($data)
    {
        $link = new Node($data);
        $link->next = $this->firstNode;
        $this->firstNode = $link;
        if ($this->lastNode == null) {
            $this->lastNode = $link;
        }
        return $this->count++;
    }

    public function insertLast($data)
    {
        if ($this->firstNode != null) {
            $link = new Node($data);
            $this->lastNode->next = $link;
            $this->lastNode = $link;
            $this->count++;
        } else {
            $this->insertFirst($data);
        }
    }

    public function insert($data, $index)
    {
        if ($index == 0) {
            $this->insertFirst($data);
        } else {
            $link = new Node($data);
            $current = $this->firstNode;
            $previous = $this->firstNode;

            for ($i = 0; $i < $index; $i++) {
                $previous = $current;
                $current = $current->next;
            }
            $link->next = $current;
            $previous->next = $link;
            $this->count++;
        }
    }

    public function totalNodes()
    {
        return $this->count;
    }

    public function readList()
    {
        $listData = [];
        $current = $this->firstNode;
        while ($current != null) {
            array_push($listData, $current->readNode());
            $current = $current->next;
        }
        return $listData;
    }

    public function getFirstNode()
    {
        return $this->firstNode;
    }

    public function getLastNode()
    {
        return $this->lastNode;
    }
}