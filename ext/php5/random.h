#ifndef DD_RANDOM_H
#define DD_RANDOM_H
#include <Zend/zend_types.h>
#include <php.h>
#include <stdbool.h>
#include <stdint.h>

#include "compatibility.h"

#define DD_TRACE_MAX_ID_LEN 20  // uint64_t -> 2**64 = 20 chars max ID

// We keep a separate stack for span ID generation since spans are
// generated from userland as well
typedef struct ddtrace_span_ids_t {
    uint64_t id;
    struct ddtrace_span_ids_t *next;
} ddtrace_span_ids_t;

void ddtrace_seed_prng(TSRMLS_D);
void ddtrace_init_span_id_stack(TSRMLS_D);
void ddtrace_free_span_id_stack(TSRMLS_D);
bool ddtrace_set_userland_trace_id(zval *zid TSRMLS_DC);
uint64_t ddtrace_push_span_id(uint64_t id TSRMLS_DC);
bool ddtrace_push_userland_span_id(zval *zid TSRMLS_DC);
uint64_t ddtrace_pop_span_id(TSRMLS_D);
uint64_t ddtrace_peek_span_id(TSRMLS_D);

#endif  // DD_RANDOM_H
