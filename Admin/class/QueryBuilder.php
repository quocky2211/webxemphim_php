<?php
    interface SQLQueryBuilder
    {
        public function select(array $columnList):SQLQueryBuilder;
        public function insert(string $tableName):SQLQueryBuilder;
        public function update(string $tableName):SQLQueryBuilder;
        public function delete():SQLQueryBuilder;
        public function into(array $columnList):SQLQueryBuilder;
        public function values(array $valueList):SQLQueryBuilder;
        public function set(string $field, string $value):SQLQueryBuilder;
        public function from(array $tableList):SQLQueryBuilder;   
        public function where(string $field, string $operator, string $value): SQLQueryBuilder;
        public function limit(int $start, int $offset): SQLQueryBuilder;
        public function getSQL(): string;
    }

    class MysqlQueryBuilder implements SQLQueryBuilder
    {
        protected $query;

        protected function ResetQuery():void
        {
            $this->query = new \stdClass();//Khởi tạo 1 object query rỗng
        }

        public function select(array $columnList):SQLQueryBuilder 
        { 
            $this->ResetQuery();//Khởi tạo 1 query rỗng
            $this->query->start = "SELECT ".implode(",",$columnList)." ";
            $this->query->type = "select";
            return $this; 
        }

        public function insert(string $tableName):SQLQueryBuilder
        {
            $this->ResetQuery();//Khởi tạo 1 query rỗng
            $this->query->start = "INSERT INTO ".$tableName."(";
            return $this;
        }

        public function update(string $tableName):SQLQueryBuilder
        {
            $this->ResetQuery();//Khởi tạo 1 query rỗng
            $this->query->start = "UPDATE ".$tableName." ";
            $this->query->type = "update";
            return $this;
        }

        public function delete():SQLQueryBuilder
        {
            $this->ResetQuery();//Khởi tạo 1 query rỗng
            $this->query->start = "DELETE ";
            $this->query->type = "delete";
            return $this;
        }

        public function into(array $columnList):SQLQueryBuilder
        {
            $this->query->into = implode(",",$columnList).") ";
            return $this;
        }

        public function values(array $valueList):SQLQueryBuilder
        {
            $this->query->values = "VALUES(".implode(",",$valueList).")";
            return $this;
        }

        public function set(string $field, string $value):SQLQueryBuilder
        {
            $this->query->set = "SET ".$field." = ".$value." ";
            return $this;
        }

        public function from(array $tableList):SQLQueryBuilder
        { 
            if(!empty($tableList))
                $this->query->from = "FROM ".implode(",",$tableList)." ";
            else
                throw new \Exception("Cần có FROM để truy vấn");
            return $this; 
        }
    
        public function where(string $field,string $operator,string $value): SQLQueryBuilder
        { 
            if (!in_array($this->query->type, ['select', 'update', 'delete']))
                throw new \Exception("WHERE chỉ tồn tại khi có SELECT, UPDATE hoặc DELETE");
            $this->query->where[] = "$field $operator '$value'";
            return $this; 
        }
    
        public function limit(int $start, int $offset): SQLQueryBuilder
        { 
            if (!in_array($this->query->type, ['select']))
                throw new \Exception("LIMIT chỉ có thể thêm bởi SELECT");
            $this->query->limit = " LIMIT " . $start . ", " . $offset;
            return $this; 
        }
        
        public function getSQL(): string
        { 
            $query = $this->query;
            $sql = $query->start;
            if(isset($query->from))
            {
                $sql .= $query->from;
            }
            if(isset($query->into))
            {
                $sql .= $query->into;
            }
            if(isset($query->values))
            {
                $sql .= $query->values;
            }
            if(isset($query->set))
            {
                $sql .= $query->set;
            }
            if (!empty($query->where)) 
            {
                $sql .= " WHERE " . implode(' AND ', $query->where);
            }
            if (isset($query->limit)) 
            {
                $sql .= $query->limit;
            }
            $sql .= ";";
            return $sql;
        }
    }

    /*function clientCode(SQLQueryBuilder $queryBuilder)
    {
        $query = $queryBuilder
                ->select(["*"])
                ->from(["account"])
                ->where("MaTK", "=",5)
                ->getSQL();
        echo $query;
    }

    clientCode(new MysqlQueryBuilder());*/

    /*$query = new MysqlQueryBuilder();
    $query01 = $query   ->insert("account") 
                        ->into(["`Name`","`Username`","`Password`","`Role`","`XuKhoa`"])       
                        ->values(["'Thụy'","'ThuyNguyen'","'123456'","DEFAULT","DEFAULT"])
                        ->getSQL();*/
    /*$query02 = $query   ->update("phim")
                        ->set("LuotLike","LuotLike + 1")
                        ->where("MaPhim", "=",$MaPhim)
                        ->getSQL();
    /*$query06 = $query   ->delete()
                        ->from(["tintuc"])
                        ->where("MaTinTuc", "=",1)
                        ->getSQL();                   
    echo $query01."</br>".$query02."</br>".$query06;*/


?>