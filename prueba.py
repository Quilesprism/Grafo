def validate_matrix(matrix):
    if not matrix or not all(isinstance(row, list) for row in matrix):
        raise ValueError("Input must be a 2D list.")
    row_length = len(matrix[0])
    if not all(len(row) == row_length for row in matrix):
        raise ValueError("All rows must have the same number of columns.")

def transpose_matrix(matrix):
    return [list(row) for row in zip(*matrix)]

def row_sums(matrix):
    return [sum(row) for row in matrix]

def column_products(matrix):
    transposed = transpose_matrix(matrix)
    return [product(col) for col in transposed]

def product(lst):
    result = 1
    for num in lst:
        result *= num
    return result

def spiral_traversal(matrix):
    result = []
    while matrix:
        result += matrix.pop(0)
        if matrix and matrix[0]:
            for row in matrix:
                result.append(row.pop())
        if matrix:
            result += matrix.pop()[::-1]
        if matrix and matrix[0]:
            for row in matrix[::-1]:
                result.append(row.pop(0))
    return result

def rotate_matrix_90(matrix):
    if not matrix or not matrix[0]:
        return matrix  
    return [list(row) for row in zip(*matrix[::-1])]

def rotate_matrix_180(matrix):
    if not matrix or not matrix[0]:
        return matrix  
    return [row[::-1] for row in matrix[::-1]]


def main():
    matrix = [
        [1, 2, 3],
        [4, 5, 6],
        [7, 8, 9]
    ]

    try:
        validate_matrix(matrix)
    except ValueError as e:
        print(f"Invalid matrix: {e}")
        return
    print("Original Matrix:")
    for row in matrix:
        print(row)
        rotated_90 = rotate_matrix_90(matrix)
    rotated_180 = rotate_matrix_180(matrix)

    print("\nRotated Matrix 90°:")
    for row in rotated_90:
        print(row)
    print("\nRotated Matrix 180°:")
    for row in rotated_180:
        print(row)
    transposed = transpose_matrix(matrix)
    print("\nTransposed Matrix:")
    for row in transposed:
        print(row)

    row_sum = row_sums(matrix)
    print("\nRow Sums:", row_sum)

    col_product = column_products(matrix)
    print("Column Products:", col_product)

    spiral = spiral_traversal(matrix)
    print("Spiral Traversal:", spiral)

if __name__ == "__main__":
    main()